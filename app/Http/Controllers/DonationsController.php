<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

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
        // TODO Write down notification logic and call it here.

        return response()->json([
            'status' => 'success',
            'message' => 'Here!',
        ]);
    }
}
