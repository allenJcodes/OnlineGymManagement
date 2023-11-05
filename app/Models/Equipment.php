<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = [
        "equipment_name",
        "description",
        'equipment_type',
        'status',
        'image_path'
    ];
}
