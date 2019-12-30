<?php

namespace App\Managers;

use App\Models\Philanthropist;
use Illuminate\Support\Facades\Auth;

class PhilanthropistsManager
{
    /*
     * Create and store philantropist.
     *
     * @param array $data
     * @return Philanthropist
     */
    public function store(array $data)
    {
        $philanthropist = new Philanthropist();

        $philanthropist->first_name = $data['first_name'];
        $philanthropist->last_name = $data['last_name'];
        $philanthropist->email = $data['email'];
        $philanthropist->phone_number = $data['phone_number'];
        $philanthropist->is_active = true;
        $philanthropist->company_id = Auth::user()->company_id;

        $philanthropist->save();

        return $philanthropist;
    }

    /*
     * Update philantropist.
     *
     * @param Philanthropist $philanthropist
     * @param array $data
     * @return Philanthropist
     */
    public function update(Philanthropist $philanthropist, array $data)
    {
        $philanthropist->first_name = $data['first_name'];
        $philanthropist->last_name = $data['last_name'];
        $philanthropist->email = $data['email'];
        $philanthropist->phone_number = $data['phone_number'];
        $philanthropist->is_active = true;
        $philanthropist->company_id = Auth::user()->company_id;

        $philanthropist->save();

        return $philanthropist;
    }
}
