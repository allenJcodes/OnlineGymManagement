<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    use HasFactory;

    protected $table = 'mode_of_payments';

    protected $fillable = [
        'name',
        'account_no',
        'image'
    ];
}
