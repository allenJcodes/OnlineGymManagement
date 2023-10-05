<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "date_started",
        "date_ended"
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
}
