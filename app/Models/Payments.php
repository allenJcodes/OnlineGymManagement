<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
    
    public function scopeSearch(Builder $query) {
        $query->leftJoin('subscriptions', 'subscriptions.id', 'payments.subscription_id')
        ->leftJoin('subscription_types', 'subscription_types.id', 'subscriptions.subscription_type_id')
        ->leftJoin('users', 'users.id', 'subscriptions.user_id')
        ->whereRaw('CONCAT(users.first_name, " ", users.middle_name, " ", users.last_name) like ?', [request()->search."%"])
        ->orWhereRaw('CONCAT(users.first_name, " ", users.last_name) like ?', [request()->search."%"])
        ->orWhere('users.first_name', 'like', request()->search . '%')
        ->orWhere('users.middle_name', 'like', request()->search . '%')
        ->orWhere('users.last_name', 'like', request()->search . '%')
        ->orWhere('subscription_types.name', 'like', request()->search . '%')
        ->orWhere('subscription_types.price', 'like', request()->search . '%')
        ->orWhere('payments.amount_paid', 'like', request()->search . '%')
        ->orWhere('payments.mode_of_payment', 'like', request()->search . '%')
        ->orWhere('payments.reference_number', 'like', request()->search . '%')
        ->select([
            '*', 'payments.id as id', 'payments.status as status'
        ]);
    }

    public function subscriptions() : BelongsTo {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}
