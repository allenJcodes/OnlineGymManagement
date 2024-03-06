<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    use HasFactory;

    protected $table = 'subscription_types';

    protected $fillables = [
        'name',
        'price',
        'number_of_months',
        'description',
    ];
}
