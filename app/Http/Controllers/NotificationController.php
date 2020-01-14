<?php

namespace App\Http\Controllers;


use App\Notification;

class NotificationController extends Controller
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
     * Show list of users
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function read($notification_id)
    {
        $notification = Notification::where(['id' => $notification_id]);

        $notification->read = true;
        $notification->save();

        return redirect()->route('jobs.index', ['id' => $notification->job->id]);
    }
}
