<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'attendance_id',
        'time_in',
        'time_out',
    ];

    
    protected $casts = [
        'time_in' => 'datetime',
        'time_out' => 'datetime',
    ];
    
    public $timestamps = false;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function attendance() : BelongsTo {
        return $this->BelongsTo(Attendance::class);
    }
}
