<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
        "qr_code",
        "status",
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    
    public function scopeSearch(Builder $query) {
        $query->leftJoin('users', 'users.id', 'subscriptions.user_id')
        ->leftJoin('subscription_types', 'subscription_types.id', 'subscriptions.subscription_type_id')
        ->whereRaw('CONCAT(users.first_name, " ", users.middle_name, " ", users.last_name) like ?', [request()->search."%"])
        ->orWhereRaw('CONCAT(users.first_name, " ", users.last_name) like ?', [request()->search."%"])
        ->orWhere('users.first_name', 'like', request()->search . '%')
        ->orWhere('users.middle_name', 'like', request()->search . '%')
        ->orWhere('users.last_name', 'like', request()->search . '%')
        ->orWhere('subscriptions.start_date', 'like', request()->search . '%')
        ->orWhere('subscriptions.end_date', 'like', request()->search . '%')
        ->orWhere('subscription_types.name', 'like', request()->search . '%')
        ->orWhere('subscription_types.price', 'like', request()->search . '%')
        ->orWhere('subscription_types.duration', 'like', request()->search . '%')
        ->select([
            '*', 'subscriptions.id as id'
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', "id")->withTrashed();
    }

    public function subscriptionTypes(): HasOne
    {
        return $this->HasOne(SubscriptionType::class, 'id', 'subscription_type_id')->withTrashed();;
    }

    public function endingSoon() {
        return Carbon::parse($this->end_date)->subWeek() <= Carbon::parse(now()->format('Y-m-d'));
    }
}
