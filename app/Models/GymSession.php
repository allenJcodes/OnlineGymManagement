<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymSession extends Model
{
    use HasFactory;

    protected $table = "gym_sessions";

    protected $fillable = [
        'title',
        'content',
    ];

    public function scopeSearch(Builder $query) {
        $query->where('title', 'like', '%' . request()->search . '%')
        ->orWhere('content', 'like', '%' . request()->search . '%');
    }

}
