<?php

namespace App\Listeners;

use App\Events\NewNotification;
use App\Models\Notification;
use Illuminate\Bus\Batchable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function handle(NewNotification $event)
    {
        $driverKey = 'notification.driver.' . strtolower($event->notification->channel);
        if (app()->bound($driverKey)) {
            $driver = app($driverKey);
            $driver->send($event->notification);
        }
    }
}
