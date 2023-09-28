<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'attendance_date',
        'attendance_time_in',
        'attendance_time_out',
    ];

    public function attendanceBy()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
}
