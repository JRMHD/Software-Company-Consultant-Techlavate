<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;

    public function __construct(QuoteRequest $quote)
    {
        $this->quote = $quote;
    }

    public function build()
    {
        return $this->subject('New Quote Request from ' . $this->quote->company_name)
            ->view('emails.quote_admin')
            ->with(['quote' => $this->quote]);
    }
}
