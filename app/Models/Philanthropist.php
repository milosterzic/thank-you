<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * Get donations of philanthropist.
     *
     * @return HasMany
     */
    public function donations() : HasMany
    {
        return $this->hasMany(Donation::class);
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

    /**
     * Check not thanked donations.
     *
     * @return bool
     */
    public function hasNotThakedDonations() : bool
    {
        return $this->donations()->notThanked()->exists();
    }

    /**
     * Check not thanked donations.
     *
     * @return Donation
     */
    public function getFirstNotThakedDonation() : Donation
    {
        return $this->donations()->notThanked()->orderBy('created_at', 'asc')->first();
    }
}
