<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'schedule_id',
    ];

    public function ownedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function schedule()
    {
        return $this->hasOne(Schedules::class, 'id', 'schedule_id');
    }
}
