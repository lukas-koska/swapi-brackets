<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
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
        'average_height',
        'average_lifespan',
        'classification',
        'created',
        'designation',
        'edited',
        'eye_colors',
        'hair_colors',
        'language',
        'skin_colors',
        'url',
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
        'averageHeight' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'average_height',
        ],
        'averageLifespan' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'average_lifespan',
        ],
        'classification' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'classification',
        ],
        'created' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'created',
        ],
        'designation' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'designation',
        ],
        'edited' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'edited',
        ],
        'eyeColors' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'eye_colors',
        ],
        'hairColors' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'hair_colors',
        ],
        'language' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'language',
        ],
        'skinColors' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'skin_colors',
        ],
        'url' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'url',
        ],
    ];
}
