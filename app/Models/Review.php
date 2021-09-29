<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Review
 * @package App\Models
 * @version July 16, 2021, 2:32 pm UTC
 *
 * @property string $name
 * @property string $image
 * @property string $review
 */
class Review extends Model
{


    public $table = 'reviews';




    public $fillable = [
        'name',
        'image',
        'review'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'review' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'image' => 'required|max:5000',
        'review' => 'required'
    ];


}
