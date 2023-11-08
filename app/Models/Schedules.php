<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'class_name',
        'date_time_start',
        'date_time_end',
        'max_clients',
        'number_of_attendees',
    ];

    public function instructor()
    {
        return $this->hasOne(User::class, 'id', 'staff_id');
    }
}
