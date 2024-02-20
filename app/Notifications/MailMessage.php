<?php
namespace App\Notifications;

use App\Models\NotificationSetting;
use Illuminate\Notifications\Messages\MailMessage as BaseMailMessage;

class MailMessage extends BaseMailMessage
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function content(string $content): static
    {
        return $this;
    }

    public function settings(?NotificationSetting $setting): static
    {
        return $this;
    }
}
