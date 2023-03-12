<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'about_me';

    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * Define model fields
     * @var array
     */
    public $fields = [
        'name' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'name',
        ],
        'perex' => [
            'cast' => 'text',
            'column' => 'perex',
        ],
        'text' => [
            'cast' => 'text',
            'column' => 'text',
        ],
        'language' => [
            'cast' => 'string',
            'maxlength' => 10,
            'column' => 'title',
        ],
        'used' => [
            'cast' => 'boolean',
            'column' => 'used',
        ],
    ];
}
