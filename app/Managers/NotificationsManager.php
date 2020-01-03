<?php

namespace App\Managers;

use App\Models\Philanthropist;
use App\Notifications\PhilanthropistHelped;
use Carbon\Carbon;

class NotificationsManager
{
    /**
     * Notify philanthropist and mark down notification.
     *
     * @param int $philanthropistId
     * @return void
     */
    public function notify(int $philanthropistId)
    {
        $philanthropist = Philanthropist::find($philanthropistId);

        if ($philanthropist->hasNotThakedDonations()) {
            $donation = $philanthropist->getFirstNotThakedDonation();
            $donation->thanked_at = Carbon::now();
            $donation->save();

            $philanthropist->notify(new PhilanthropistHelped);
        }
    }
}
