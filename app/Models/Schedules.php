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

    protected $casts = [
        'date_time_start' => 'datetime',
        'date_time_end' => 'datetime',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function attendance(): BelongsTo
    {
        return $this->BelongsTo(Attendance::class, 'schedule_id', 'id');
    }
}
