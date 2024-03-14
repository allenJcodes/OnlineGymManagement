<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
    ];

    public function scopeSearch(Builder $query) {
        $query->leftJoin('users', 'users.id', 'instructors.user_id')
        ->whereRaw('CONCAT(users.first_name, " ", users.middle_name, " ", users.last_name) like ?', [request()->search."%"])
        ->orWhereRaw('CONCAT(users.first_name, " ", users.last_name) like ?', [request()->search."%"])
        ->orWhere('users.first_name', 'like', request()->search . '%')
        ->orWhere('users.middle_name', 'like', request()->search . '%')
        ->orWhere('users.last_name', 'like', request()->search . '%')
        ->orWhere('instructors.description', 'like', request()->search . '%')
        ->select([
            '*', 'instructors.id as id'
        ]);
    }

    public function user() : HasOne {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // public function schedules() : BelongsToMany {
    //     return $this->belongsToMany(Schedules::class);
    // }
}
