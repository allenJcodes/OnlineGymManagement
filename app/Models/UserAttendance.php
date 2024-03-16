<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'attendance_id',
        'time_in',
        'time_out',
    ];
}
