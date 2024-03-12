<?php

namespace App\Models;

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

    public function user() : HasOne {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // public function schedules() : BelongsToMany {
    //     return $this->belongsToMany(Schedules::class);
    // }
}
