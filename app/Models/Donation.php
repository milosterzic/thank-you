<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    /**
     * Get company of donation.
     *
     * @return BelongsTo
     */
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get philanthropist of donation.
     *
     * @return BelongsTo
     */
    public function philanthropist() : BelongsTo
    {
        return $this->belongsTo(Philanthropist::class);
    }

    /**
     * Scope a query to only include thanked donations.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeThanked(Builder $query)
    {
        return $query->whereNotNull('thanked_at');
    }

    /**
     * Scope a query to only include not thanked donations.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeNotThanked(Builder $query)
    {
        return $query->whereNull('thanked_at');
    }
}
