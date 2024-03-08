<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionTypeInclusion extends Model
{
    use HasFactory;

    protected $table = 'subscription_type_inclusions';
    
    protected $fillable = [
        'name',
        'subscription_type_id',
    ];

    public function subscriptionType() : BelongsTo {
        return $this->belongsTo(SubscriptionType::class);
    }
}
