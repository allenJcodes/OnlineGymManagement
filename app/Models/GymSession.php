<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GymSession extends Model
{
    use HasFactory, SoftDeletes;

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
