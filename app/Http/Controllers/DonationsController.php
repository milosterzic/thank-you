<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyPhilanthropist;
use App\Managers\NotificationsManager;
use App\Models\Philanthropist;
use App\Notifications\PhilanthropistHelped;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class DonationsController extends Controller
{
    protected $notificationManager;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotificationsManager $notificationsManager)
    {
        $this->middleware('auth');

        $this->notificationManager = $notificationsManager;
    }

    /**
     * Send notification to philanthropist.
     *
     * @param NotifyPhilanthropist $request
     * @return JsonResponse
     */
    public function notify(NotifyPhilanthropist $request) : JsonResponse
    {
        $this->notificationManager->notify($request->get('philanthropist_id'));

        return response()->json([
            'status' => 'success',
            'message' => 'Here!',
        ]);
    }
}
