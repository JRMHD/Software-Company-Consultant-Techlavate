<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('Thanks for subscribing to our newsletter!')
            ->view('emails.newsletter_welcome')
            ->with(['email' => $this->email]);
    }
}
