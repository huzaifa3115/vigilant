<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Blog
 * @package App\Models
 * @version July 16, 2021, 1:54 pm UTC
 *
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $description
 */
class Blog extends Model
{


    public $table = 'blogs';




    public $fillable = [
        'title',
        'slug',
        'image',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'image' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'image' => 'required|max:5000',
        'description' => 'required'
    ];


}
