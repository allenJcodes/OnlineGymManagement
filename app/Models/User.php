<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    protected $appends = ['full_name'];

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

    public function notifications() : BelongsToMany {
        return $this->belongsToMany(Notification::class, 'user_notifications');
    }

    public function role() : BelongsTo {
        return $this->belongsTo(UserRoles::class, 'user_role');
    }

    function instructor() : BelongsTo {
        return $this->belongsTo(Instructor::class, 'user_id', 'id');
    }
    
}
