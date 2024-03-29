<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'refer_by',
        'refer_code'
    ];
}
