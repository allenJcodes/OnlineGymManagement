<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contact_details';

    protected $fillable = [
        'contact_detail_type_id',
        'label',
        'content',
    ];

    public function scopeSearch(Builder $query) {
        
        $query
        ->leftJoin('contact_detail_types', 'contact_detail_types.id', 'contact_details.contact_detail_type_id')
        ->where('contact_details.label', 'like', '%' . request()->search . '%')
        ->orWhere('contact_details.content', 'like', '%' . request()->search . '%')
        ->orWhere('contact_detail_types.name', 'like', request()->search . '%');

    }

    public function contactDetailType() : BelongsTo {
        return $this->belongsTo(ContactDetailType::class);
    }
}
