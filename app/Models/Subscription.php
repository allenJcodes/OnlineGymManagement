<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "subscription_type_id",
        "start_date",
        "end_date",
        'status',
    ];
    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }

    public function subscriptionTypes(): HasOne
    {
        return $this->HasOne(SubscriptionType::class, 'id', 'subscription_type_id');
    }
}
