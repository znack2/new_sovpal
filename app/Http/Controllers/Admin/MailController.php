<?php

class MailController extends AdminController
{
    public function index()
    {
        $notifications = Auth::user()->notifications();

        Auth::user()->notification_count = 0;
        Auth::user()->save();

        return View::make('notifications.index', compact('notifications'));
    }

    public function destroy($id)
    {
        Notification::destroy($id);

        return Redirect::route('notifications.index');
    }

    public function count()
    {
        return Auth::user()->notification_count;
    }
}
