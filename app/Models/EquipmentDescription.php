<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentDescription extends Model
{
    use HasFactory;

    protected $table = 'equipment_descriptions';

    protected $fillable = [
        'content'
    ];
}
