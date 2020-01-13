<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyPhilanthropist;
use App\Http\Requests\StoreDonation;
use App\Managers\DonationsManager;
use App\Managers\NotificationsManager;
use App\Models\Philanthropist;
use App\Notifications\PhilanthropistHelped;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class DonationsController extends Controller
{
    protected $notificationManager;
    protected $donationsManager;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotificationsManager $notificationsManager, DonationsManager $donationsManager)
    {
        $this->middleware('auth');

        $this->notificationManager = $notificationsManager;
        $this->donationsManager = $donationsManager;
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

    /**
     * Add donation to philanthropist.
     *
     * @param StoreDonation $request
     * @return JsonResponse
     */
    public function create(StoreDonation $request) : JsonResponse
    {
        $this->donationsManager->store($request->get('philanthropist_id'));

        return response()->json([
            'status' => 'success',
            'message' => 'Here!',
        ]);
    }
}
