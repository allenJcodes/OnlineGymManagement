<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "subscription_type_id",
        "start_date",
        "end_date",
        'status',
        'mode_of_payment',
        'reference_number',
        'amount_paid',
    ];


    public function subscribedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }

}
