<?php

namespace App\Managers;

use App\Models\Philanthropist;
use Illuminate\Support\Facades\Auth;

class PhilantropistsManager
{
    /*
     * Create and store philantropist.
     *
     * @param array $data
     * @return Philanthropist
     */
    public function store(array $data)
    {
        $philantropist = new Philanthropist();

        $philantropist->first_name = $data['first_name'];
        $philantropist->last_name = $data['last_name'];
        $philantropist->email = $data['email'];
        $philantropist->phone_number = $data['phone_number'];
        $philantropist->company_id = Auth::user()->company_id;

        $philantropist->save();

        return $philantropist;
    }
}
