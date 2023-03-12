<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'news';

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
     * @var array<string>
     */
    protected $fillable = ['subtitle', 'title', 'date', 'duedate', 'language', 'linktext', 'text'];

    /**
     * Define model fields
     * @var array
     */
    public $fields = [
        'subTitle' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'subtitle',
        ],
        'title' => [
            'cast' => 'string',
            'maxlength' => 100,
            'column' => 'title',
        ],
        'date' => [
            'cast' => 'datetime',
            'column' => 'date',
        ],
        'dueDate' => [
            'cast' => 'datetime',
            'column' => 'due_date',
        ],
        'language' => [
            'cast' => 'string',
            'maxlength' => 10,
            'column' => 'title',
        ],
        'linkText' => [
            'cast' => 'string',
            'maxlength' => 255,
            'column' => 'link',
        ],
        'text' => [
            'cast' => 'text',
            'column' => 'text',
        ],
        'color' => [
            'cast' => 'string',
            'maxlength' => 50,
            'column' => 'color',
        ],
    ];
}
