<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $fillable = [
        'equipment_id',
        "quantity",
        'purchase_date',
        'warranty_information',
        'maintenance_history',
    ];

    public function scopeSearch(Builder $query) {
        $query->leftJoin('equipment', 'equipment.id', 'inventory.equipment_id')
        ->leftJoin('equipment_types', 'equipment_types.id', 'equipment.equipment_type_id')
        ->where('purchase_date', 'like', request()->search . '%')
        ->orWhere('warranty_information', 'like', request()->search . '%')
        ->orWhere('maintenance_history', 'like', request()->search . '%')
        ->orWhere('equipment.equipment_name', 'like', request()->search . '%')
        ->orWhere('equipment_types.name', 'like', request()->search . '%');
    }

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
