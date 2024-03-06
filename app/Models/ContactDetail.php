<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactDetail extends Model
{
    use HasFactory;

    protected $table = 'contact_details';

    protected $fillables = [
        'contact_details_type_id',
        'label',
        'content',
    ];

    public function contactDetailType() : BelongsTo {
        return $this->belongsTo(ContactDetailType::class);
    }
}
