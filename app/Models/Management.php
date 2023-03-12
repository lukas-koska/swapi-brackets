<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'management';

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
        'firstName' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'first_name',
        ],
        'lastName' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'last_name',
        ],
        'email' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'email',
        ],
        'phone' => [
            'cast' => 'string',
            'maxlength' => 100,
            'column' => 'phone',
        ],
        'language' => [
            'cast' => 'string',
            'maxlength' => 10,
            'column' => 'title',
        ],
        'used' => [
            'cast' => 'boolean',
            'column' => 'used',
            'default' => true,
        ],
    ];
}
