<?php

namespace App\Managers;

use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationsManager
{
    /**
     * Add new donation to philanthropist.
     *
     * @param int $philanthropistId
     * @return Donation
     */
    public function store(int $philanthropistId) : Donation
    {
        $donation = new Donation();

        $donation->company_id = Auth::user()->company_id;
        $donation->philanthropist_id = $philanthropistId;

        $donation->save();

        return $donation;
    }
}
