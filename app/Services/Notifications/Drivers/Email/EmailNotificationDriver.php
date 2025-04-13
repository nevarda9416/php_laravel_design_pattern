<?php

namespace App\Services\Notifications;

use App\Services\Notifications\Drivers\NotificationDriverInterface;
use App\Models\Notification;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class EmailNotificationDriver implements NotificationDriverInterface
{
    public function send(Notification $notification)
    {
        Mail::to($notification->notifiable->email)->send(new SendEmail($notification->data));
    }
}
