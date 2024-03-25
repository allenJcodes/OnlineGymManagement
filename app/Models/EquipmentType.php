<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EquipmentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function scopeSearch(Builder $query) {
        $query->where('name', 'like', '%' . request()->search . '%');
    }
}
