<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnContent extends Model
{
    use HasFactory;

    protected $table = "learn_content";

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image'
    ];

    public function scopeSearch(Builder $query) {
        $query->where('title', 'like', '%' . request()->search . '%')
        ->orWhere('subtitle', 'like', '%' . request()->search . '%')
        ->orWhere('content', 'like', '%' . request()->search . '%');
    }
}
