<?php

namespace app\Services\Notifications\Drivers;

use app\Models\Notification;

interface NotificationDriverInterface
{
    public function send(Notification $notification);
}
