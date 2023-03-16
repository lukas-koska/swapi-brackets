<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanetSpecies extends Model
{
    use HasFactory;

    /**
     * Define model fields
     * @var array
     */
    public array $fields = [
        'planetId' => [
            'cast' => 'int',
            'column' => 'planet_id',
        ],
        'speciesId' => [
            'cast' => 'int',
            'column' => 'species_id',
        ],
        'numberOfPeople' => [
            'cast' => 'int',
            'column' => 'number_of_people',
        ],
    ];
}
