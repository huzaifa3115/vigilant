<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stripe_id',
        'plan_id',
        'payment_method_id',
        'first_name',
        'last_name',
        'user_name',
        'email',
        'address',
        'address2',
        'country',
        'state',
        'zip',
    ];
}
