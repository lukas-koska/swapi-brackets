<?php

namespace App\Repositories;

use App\Models\Species;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class SpeciesRepository.
 */
class SpeciesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Species::class;
    }


    public function getPlanetCounts() : int
    {
        return Species::all()->count();
    }

    public function saveSpecies(array $speciesArray): int
    {
        // Get Species names
        if (array_key_exists('name', $speciesArray)) {
            $name = $speciesArray['name'];

            // Find existing ids for names
            $id = $this->getIdFromName($name);
            if (count($id) === 0) {

                $species = new Species($speciesArray);
                $species->save();
                return $species['id'];

            }

            return $id['id'];
        }

        return 0;
    }

    /**
     * @param string $name
     * @return array<string, int>
     */
    private function getIdFromName(string $name) : array
    {
        $existingName = Species::select('id')->where('name', $name)->first();
        return $existingName === null ? [] : $existingName->toArray();
    }
}
