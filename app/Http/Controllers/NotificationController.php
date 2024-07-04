<?php

namespace App\Http\Controllers;

use App\Strategies\NotificationContext;
use App\Strategies\UserNotificationStrategy;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function userNotifications()
    {
        $context = new NotificationContext(new UserNotificationStrategy());
        $notifications = $context->getNotifications();

        return view('notificationsPage', compact('notifications'));
    }

    public function showNotificationPage()
    {
        return view('notificationsPage');
    }
}