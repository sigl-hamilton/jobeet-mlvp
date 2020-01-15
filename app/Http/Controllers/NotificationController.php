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
    public function read($id)
    {
        $notification = Notification::where(['id' => $id])->first();

        $notification->read = true;
        $notification->save();

        return redirect()->route('job.index', ['id' => $notification->job->id]);
    }
}
