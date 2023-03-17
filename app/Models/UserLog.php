<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
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
        'mood',
        'weather',
        'gps',
        'note',
    ];

    /**
     * Define model fields
     * @var array<string, array<string|int>>
     */
    public array $fields = [
        'mood' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'mood',
        ],
        'weather' => [
            'cast' => 'string',
            'maxlength' => 100,
            'column' => 'weather',
        ],
        'gps' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'gps',
        ],
        'note' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'note',
        ],
    ];
}
