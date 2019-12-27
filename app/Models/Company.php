<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Company extends Model
{
    /**
     * Get users of company.
     *
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get philanthropists of company.
     *
     * @return HasMany
     */
    public function philanthropists() : HasMany
    {
        return $this->hasMany(Philanthropist::class);
    }

    /**
     * Get active philanthropists of company.
     *
     * @return Collection
     */
    public function getActivePhilanthropists() : Collection
    {
        return $this->philanthropists()->active()->get();
    }

}
