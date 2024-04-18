<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inventory';

    protected $fillable = [
        'equipment_id',
        'purchase_date',
        'warranty_information',
        'maintenance_history',
    ];

    protected $appends = ['quantity', 'availableQty'];

    public function getQuantityAttribute()
    {
        $equipmentStatuses =  $this->equipment->equipmentStatus;
        $totalQuantity = 0;

        foreach ($equipmentStatuses as $status) {
        $totalQuantity += $status->quantity;
        }

        return $totalQuantity;
    }

    public function getAvailableQtyAttribute()
    {
       return $this->equipment->equipmentStatus[0]->quantity;
    }

    public function scopeSearch(Builder $query) {
        $query->select('inventory.id', 'inventory.equipment_id', 'inventory.purchase_date', 'inventory.warranty_information', 'inventory.maintenance_history', 'equipment.equipment_name', 'equipment.equipment_description_id', 'equipment.equipment_type_id', 'equipment_types.name')
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
        return $this->belongsTo(Equipment::class, 'equipment_id')->withTrashed();
    }
}
