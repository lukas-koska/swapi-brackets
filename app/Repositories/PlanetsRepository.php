<?php

namespace App\Repositories;

use App\Models\Planet;
use App\Services\SwapiApiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PlanetsRepository.
 */
class PlanetsRepository extends BaseRepository
{

    public function __construct(
        protected SpeciesRepository $speciesRepository,
        protected PlanetSpeciesRepository $planetSpeciesRepository,
        protected SwapiApiService $swapiApiService
    ) {
        parent::__construct();
    }

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Planet::class;
    }

    public function getPlanetCounts() : int
    {
        return Planet::count();
    }

    /**
     * @param array<string>|null $filter
     * @param int $page
     * @return LengthAwarePaginator
     */
    public function filterPlanets(?array $filter, $page = 0) : LengthAwarePaginator
    {
        $query = Planet::orderBy('name');

        if ($filter !== null && count($filter) > 0) {
            foreach ($filter as $field => $data) {
                $query = $this->where($field, $data);
            }
        }

        return $query->paginate(5);
    }

    /**
     * @return array<string>
     */
    public function getPlanetsGravity() : array
    {
        /** @var Collection $gravities */
        $gravities = Planet::select('gravity')->distinct()->get();
        return $gravities->toArray();
    }

    /**
     * @param array<mixed> $planetsArray
     * @return bool
     */
    public function syncPlanets(array $planetsArray) : bool
    {
        $planetsArrayChunks = array_chunk($planetsArray, 1000);
        $planetCount = 0;
        $namesInDatabase = [];
        foreach ($planetsArrayChunks as $planetsArrayChunk) {
            foreach ($planetsArrayChunk as $planetArray) {

                // Get Planet names
                $names = array_column($planetsArrayChunk, 'name');
                // Find existing ids for names
                $existingNames = $this->getIdFromName($names);

                $planet = new Planet($planetArray);
                if (array_key_exists($planet['name'], $existingNames)) {

                    // Update existing planets
                    $planet['id'] = $existingNames[$planet['name']];
                    $planet->syncChanges();

                } else {

                    $planet->save();
                    $planetCount++;

                }
                // Get species for planet (This implementation needs to be changed, if there are millions of planets)
                $this->saveSpeciesForPlanet($planet, $planetArray['residents']);

                $namesInDatabase[] = $planet['name'];
            }

            var_dump($planetCount);
        }

        // Delete the destroyed planets
        Planet::whereNotIn('name', $namesInDatabase)->delete();

        return true;
    }

    /**
     * @param array<string> $names
     * @return array<string, int>
     */
    private function getIdFromName(array $names) : array
    {
        return Planet::whereIn('name', $names)->pluck('id', 'name')->all();
    }

    /**
     * Sync species and people lived on the planet
     * I think that this funcionality should be in service as second command
     * There is too many calls to API, so better way would be load all peoples, species
     * and sync only people lived on planet
     * @param Planet $planet
     * @param array<string> $residents
     */
    private function saveSpeciesForPlanet(Planet $planet, array $residents) : void
    {
        $speciesDistribution = [];
        foreach ($residents as $resident) {
            $response = $this->swapiApiService->receiveData($resident, 'GET');
            if ($response->status() < 400) {
                $contentArray = json_decode($response->body(), true);
                if (array_key_exists('species', $contentArray)) {
                    foreach ($contentArray['species'] as $species) {
                        $speciesResponse = $this->swapiApiService->receiveData($species, 'GET');
                        if ($speciesResponse->status() === 200) {
                            $speciesId = $this->speciesRepository->saveSpecies(json_decode($speciesResponse->body(), true));
                            if (array_key_exists($speciesId, $speciesDistribution)) {
                                $speciesDistribution[$speciesId]++;
                            } else {
                                $speciesDistribution[$speciesId] = 1;
                            }
                        }
                    }
                }
            }
        }
        $this->planetSpeciesRepository->savePlanetSpecies($speciesDistribution, $planet);
    }
}
