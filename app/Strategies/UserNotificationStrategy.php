<?php

namespace App\Strategies;

use Illuminate\Support\Facades\Auth;

class UserNotificationStrategy implements NotificationStrategy
{
    public function getNotifications()
    {
        return Auth::user()->notifications;
    }
}