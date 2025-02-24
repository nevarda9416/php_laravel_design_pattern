<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event): void
    {
        // Email the registered user
        Mail::to($event->user->email)->send(new SendEmail($event->user));
        // Handle the event (e.g., log the message, send notification. etc.)
        Log::info('Received event: ' . $event->user->name);
    }
}
