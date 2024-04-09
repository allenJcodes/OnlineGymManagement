<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subscription_types';

    protected $fillable = [
        'name',
        'price',
        'number_of_months',
        'description',
        'best_option',
    ];

    protected $appends = ['inclusions_string'];

    public function scopeSearch(Builder $query) {
        $query->where('subscription_types.name', 'like', request()->search . '%')
        ->orWhere('price', 'like', request()->search . '%')
        ->orWhere('number_of_months', 'like', request()->search . '%')
        ->orWhere('description', 'like', '%'. request()->search . '%');
    }

    public function getInclusionsStringAttribute(): string {
        $inclusions = $this->inclusions->map(fn($inclusion) => $inclusion->name);

        if(!count($inclusions)) return 'No Inclusions';

        return count($inclusions) > 2 ? implode(', ', array_slice($inclusions->toArray(), 0, 2)) . ', +' . count($inclusions) - 2 . ' more.' : implode(', ', $inclusions->toArray());
    }
    
    public function inclusions() : HasMany {
        return $this->hasMany(SubscriptionTypeInclusion::class);
    }

    public function subscription() : BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_type_id', 'id');
    }
}
