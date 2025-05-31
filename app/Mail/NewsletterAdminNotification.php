<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('New Newsletter Subscriber')
            ->view('emails.newsletter_admin')
            ->with(['email' => $this->email]);
    }
}
