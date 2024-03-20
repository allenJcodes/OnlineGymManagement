<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'amount_paid',
        'reference_number',
        'mode_of_payment',
        'status'
    ];

    public function subscriptions() : BelongsTo {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}
