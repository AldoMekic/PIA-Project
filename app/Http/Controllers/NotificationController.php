<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    // Method to retrieve notifications for a user
    public function getNotificationsByUserId($userId)
    {
        $notifications = Notification::where('user_id', $userId)->get();
        return $notifications;
    }

    // Method to retrieve notifications for a moderator
    public function getNotificationsByModeratorId($moderatorId)
    {
        $notifications = Notification::where('moderator_id', $moderatorId)->get();
        return $notifications;
    }

    // Method to retrieve notifications for an administrator
    public function getNotificationsByAdminId($adminId)
    {
        $notifications = Notification::where('admin_id', $adminId)->get();
        return $notifications;
    }

    // Optionally, you could add a method to retrieve general notifications that are not specific to any user, moderator, or administrator
    public function getGeneralNotifications()
    {
        $notifications = Notification::whereNull('user_id')
                                     ->whereNull('moderator_id')
                                     ->whereNull('admin_id')
                                     ->get();
        return $notifications;
    }
}