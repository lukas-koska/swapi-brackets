<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
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
        'birth_year',
        'eye_color',
        'films',
        'name',
        'gender',
        'hair_color',
        'height',
        'homeworld',
        'mass',
        'skin_color',
        'created',
        'edited',
        'species',
        'starships',
        'url',
        'vehicles'
    ];

    /**
     * Define model fields
     * @var array<string, array<string|int>>
     */
    public array $fields = [
        'birth_year' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'birth_year',
        ],
        'eye_color' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'eye_color',
        ],
        'films' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'films',
        ],
        'gender' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'gender',
        ],
        'hair_color' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'hair_color',
        ],
        'height' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'height',
        ],
        'homeworld' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'homeworld',
        ],
        'mass' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'mass',
        ],
        'name' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'name',
        ],
        'skin_color' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'skin_color',
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
        'species' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'species',
        ],
        'starships' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'starships',
        ],
        'url' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'url',
        ],
        'vehicles' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'vehicles',
        ],
    ];
}
