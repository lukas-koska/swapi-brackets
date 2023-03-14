<?php

namespace App\Repositories;

use App\Models\Planet;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PlanetsRepository.
 */
class PlanetsRepository extends BaseRepository
{
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
        return Planet::all()->count();
    }

    /**
     * @param array|null $filter
     * @param int $page
     * @return LengthAwarePaginator
     */
    public function filterPlanets(?array $filter, $page = 0) : LengthAwarePaginator
    {
        if ($filter === null || count($filter) === 0) {
            return Planet::paginate(5);
        }
        //return [];
    }

    /**
     * @param array $planetsArray
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
                $names = array_column($planetsArray, 'name');
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
        $existingNames = Planet::whereIn('name', $names)->pluck('id', 'name')->all();
        return $existingNames ?? [];
    }
}
