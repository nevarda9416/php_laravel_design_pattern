<?php

namespace App\Notifications;

use App\Models\NotificationSetting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class SetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(User $notifiable): MailMessage
    {
        return MailMessage::make()
            ->settings($this->resolveNotificationSetting($notifiable))
            ->line('A new account has been created for you.')
            ->action('Set up your password', URL::temporarySignedRoute(
                'login.one-time',
                now()->addDay(),
                ['user' => $notifiable],
            ))
            ->line('For security reasons, this link will expire in 24 hours.')
            ->line('Please contact support if you need a new link or have any issues setting up your account.');
    }

    private function resolveNotificationSetting(User $notifiable): ?NotificationSetting
    {
        return $notifiable->teams()->first()?->division?->notificationSettting?->setting; //Giải nghĩa cách viết???
    }
}
