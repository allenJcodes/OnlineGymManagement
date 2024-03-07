<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetailType extends Model
{
    use HasFactory;
    
    protected $table = 'contact_detail_types';

    protected $fillable = [
        'name'
    ];
}

