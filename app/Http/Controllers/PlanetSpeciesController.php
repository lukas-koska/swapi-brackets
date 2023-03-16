<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Repositories\PlanetSpeciesRepository;

class PlanetSpeciesController extends Controller
{
    public function __construct(
        protected PlanetSpeciesRepository $planetSpeciesRepository,
    ) {
        // Nothing have to be done here
    }

    public function getSpeciesForPlanets(Planet $planet): array
    {
        $speciesForPlanet = [];
        $speciesPlanets = $this->planetSpeciesRepository->getSpeciesForPlanet($planet['id']);
        foreach ($speciesPlanets as $species) {
            $speciesForPlanet[] = [
                'species_id' => $species->species_id,
                'number_of_people' => $species->number_of_people,
                'species_name' => $species->name,
                'species_classification' => $species->classification,
            ];
        }
        return $speciesForPlanet;
    }
}
