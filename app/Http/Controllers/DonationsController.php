<?php

namespace App\Http\Controllers;

use App\Models\Philanthropist;
use App\Notifications\PhilanthropistHelped;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class DonationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Send notification to philanthropist.
     *
     * @return JsonResponse
     */
    public function notify() : JsonResponse
    {
        $philanthropist = Philanthropist::find(Request::get('philanthropist_id'));

        $philanthropist->notify(new PhilanthropistHelped);

        // TODO Write down notification logic and call it here.

        return response()->json([
            'status' => 'success',
            'message' => 'Here!',
        ]);
    }
}
