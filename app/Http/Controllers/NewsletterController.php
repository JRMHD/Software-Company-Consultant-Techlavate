<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        $subscriber = NewsletterSubscriber::create($validated);

        // Email to admin
        Mail::send('emails.newsletter_admin', ['email' => $subscriber->email], function ($message) {
            $message->to('limokip07@gmail.com')->subject('New Newsletter Subscriber');
        });

        // Email to subscriber
        Mail::send('emails.newsletter_welcome', ['email' => $subscriber->email], function ($message) use ($subscriber) {
            $message->to($subscriber->email)->subject('Thanks for subscribing to our newsletter!');
        });

        return response()->json(['success' => 'Thanks for subscribing!']);
    }
}
