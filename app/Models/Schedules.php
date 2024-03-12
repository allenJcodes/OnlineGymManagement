<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedules extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    
    protected $fillable = [
        'instructor_id',
        'class_name',
        'date_time_start',
        'date_time_end',
        'max_clients',
        'number_of_attendees',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function attendances()
    {
        return $this->hasMany(Reservation::class, 'schedule_id', 'id');
    }
}
