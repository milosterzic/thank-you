<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Philanthropist extends Model
{
    /**
     * Get company of user.
     *
     * @return BelongsTo
     */
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Scope a query to only include active philanthropist.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', '1');
    }

    /**
     * Scope a query to only include inactive philanthropist.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeInactive(Builder $query)
    {
        return $query->where('is_active', '0');
    }
}
