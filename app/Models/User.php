<?php
namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'user_role',
        'profile_image'
    ];

    protected $appends = ['full_name', 'active_subscription'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearch(Builder $query) {
        $query->whereRaw('CONCAT(first_name, " ", middle_name, " ", last_name) like ?', [request()->search."%"])
        ->orWhereRaw('CONCAT(first_name, " ", last_name) like ?', [request()->search."%"])
        ->orWhere('first_name', 'like', request()->search . '%')
        ->orWhere('middle_name', 'like', request()->search . '%')
        ->orWhere('last_name', 'like', request()->search . '%')
        ->orWhere('email', 'like', request()->search . '%');
    }
    
    public function membership()
    {
        return $this->hasOne(Membership::class, 'user_id', "id");
    }
    
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getFullNameAttribute() {
        return $this->first_name.' '. ($this->middle_name ?? '') .' '.$this->last_name;
    }

    public function getActiveSubscriptionAttribute() {
        $subscriptions = Subscription::where('user_id', $this->id)->latest()->get();
        return $subscriptions[0] ?? null;
    }

    public function notifications() : BelongsToMany {
        return $this->belongsToMany(Notification::class, 'user_notifications');
    }

    public function role() : BelongsTo {
        return $this->belongsTo(UserRoles::class, 'user_role');
    }
}
