<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;

    public function __construct(QuoteRequest $quote)
    {
        $this->quote = $quote;
    }

    public function build()
    {
        return $this->subject('We Received Your Quote Request')
            ->view('emails.quote_user')
            ->with(['quote' => $this->quote]);
    }
}
