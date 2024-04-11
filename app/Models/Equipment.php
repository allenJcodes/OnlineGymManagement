<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "equipment_name",
        "equipment_description_id",
        'equipment_type_id',
        'image_path'
    ];

    
    protected $isAvailable = ['isAvailable'];

    public function getIsAvailableAttribute()
    {
        $equipmentStatuses =  $this->equipmentStatus;
        if ($equipmentStatuses && $equipmentStatuses[0]->quantity > 0) {
            return 'available';
        }
        return 'unavailable';
    }

    public function equipmentType(): BelongsTo
    {
        return $this->belongsTo(EquipmentType::class);
    }

    public function equipmentDescription(): BelongsTo
    {
        return $this->belongsTo(EquipmentDescription::class);
    }

    public function equipmentStatus() : HasMany
    {
        return $this->hasMany(EquipmentStatus::class);
    }

    protected static function booted()
    {
        static::deleting(function ($equipment) {
            $equipment->equipmentStatus()->delete();
        });
    }
}
