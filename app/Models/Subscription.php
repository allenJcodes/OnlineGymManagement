<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "subscription_type",
        "subscription_price",
        "subscription_start",
        "subscription_end",
    ];

    public function subscribedBy()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
}
