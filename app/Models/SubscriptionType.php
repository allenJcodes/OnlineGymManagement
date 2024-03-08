<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionType extends Model
{
    use HasFactory;

    protected $table = 'subscription_types';

    protected $fillable = [
        'name',
        'price',
        'number_of_months',
        'description',
    ];

    
    public function inclusions() : HasMany {
        return $this->hasMany(SubscriptionTypeInclusion::class);
    }
}
