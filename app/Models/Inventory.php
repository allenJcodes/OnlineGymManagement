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
        $query->select('inventory.id', 'inventory.equipment_id', 'inventory.quantity', 'inventory.purchase_date', 'inventory.warranty_information', 'inventory.maintenance_history', 'inventory.created_at', 'inventory.updated_at', 'equipment.equipment_name', 'equipment.description', 'equipment.equipment_type_id', 'equipment.status', 'equipment.image_path', 'equipment_types.name')
            ->leftJoin('equipment', 'equipment.id', 'inventory.equipment_id')
            ->leftJoin('equipment_types', 'equipment_types.id', 'equipment.equipment_type_id')
            ->where(function ($query) {
                $query->where('purchase_date', 'like', request()->search . '%')
                    ->orWhere('warranty_information', 'like', request()->search . '%')
                    ->orWhere('maintenance_history', 'like', request()->search . '%')
                    ->orWhere('equipment.equipment_name', 'like', request()->search . '%');
            })
            ->orWhere(function ($query) {
                $query->whereNotNull('equipment.equipment_type_id')
                    ->where('equipment_types.name', 'like', request()->search . '%');
            });
    }
    
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
