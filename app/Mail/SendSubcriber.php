<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSubcriber extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome Subcriber')->view('emails.subcriber')->with([
            'subject' => $this->subject,
            'message' => $this->message
        ]);
    }
}
