<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'diameter',
        'rotation_period',
        'orbital_period',
        'gravity',
        'population',
        'climate',
        'terrain',
        'surface_water',
        'url',
        'created',
        'edited'
    ];

    /**
     * Define model fields
     * @var array
     */
    public array $fields = [
        'name' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'name',
        ],
        'diameter' => [
            'cast' => 'string',
            'maxlength' => 100,
            'column' => 'diameter',
        ],
        'rotationPeriod' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'rotation_period',
        ],
        'orbitalPeriod' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'orbital_period',
        ],
        'gravity' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'gravity',
        ],
        'population' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'population',
        ],
        'climate' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'climate',
        ],
        'terrain' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'terrain',
        ],
        'surfaceWater' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'surface_water',
        ],
        'url' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'url',
        ],
        'created' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'created',
        ],
        'edited' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'edited',
        ],
    ];
}
