<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Attendance extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'schedule_id',
        'attendance_date',
        'attendance_time_in',
        'attendance_time_out',
    ];

    public function schedule(): HasOne
    {
        return $this->hasOne(Schedules::class, 'user_id', "id");
    }
}
