<?php

namespace App\Repositories;

use App\Models\Planet;
use App\Models\PlanetSpecies;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PlanetSpeciesRepository.
 */
class PlanetSpeciesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return PlanetSpecies::class;
    }


    public function getPlanetSpeciesCounts() : int
    {
        return PlanetSpecies::count();
    }

    /**
     * @param array<int, int<1, max>> $planetSpeciesArray
     * @param Planet $planet
     * @return bool
     */
    public function savePlanetSpecies(array $planetSpeciesArray, Planet $planet): bool
    {
        try {
            foreach ($planetSpeciesArray as $species => $count) {
                $planetSpecies = new PlanetSpecies();
                $planetSpecies['planet_id'] = $planet['id'];
                $planetSpecies['species_id'] = $species;
                $planetSpecies['number_of_people'] = $count;
                $planetSpecies->save();
            }
            return true;
        } catch (\Exception $ex) { }
        return false;
    }

    public function getSpeciesForPlanet(int $planetId): Collection
    {
        return DB::table('planet_species')
            ->where('planet_species.planet_id', $planetId)
            ->leftJoin('species', 'planet_species.species_id', '=', 'species.id')
            ->get();
    }
}
