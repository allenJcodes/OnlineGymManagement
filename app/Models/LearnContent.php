<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnContent extends Model
{
    use HasFactory;

    protected $table = "learn_content";

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image'
    ];
}
