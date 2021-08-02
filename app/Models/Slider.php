<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Slider
 * @package App\Models
 * @version July 13, 2021, 2:05 pm UTC
 *
 * @property string $file_name
 * @property string $path
 * @property string $size
 * @property string $format
 * @property string $title
 * @property string $description
 * @property string $button_text
 * @property string $button_url
 */
class Slider extends Model
{


    public $table = 'sliders';




    public $fillable = [
        'file_name',
        'image',
        'size',
        'format',
        'title',
        'description',
        'button_text',
        'button_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'file_name' => 'string',
        'image' => 'string',
        'size' => 'string',
        'format' => 'string',
        'title' => 'string',
        'description' => 'string',
        'button_text' => 'string',
        'button_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'image' => 'required',
        'description' => 'required',
    ];


}
