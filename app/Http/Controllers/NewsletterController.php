<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterAdminNotification;
use App\Mail\NewsletterWelcomeMail;



class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        $subscriber = NewsletterSubscriber::create($validated);

        // Send email to admin
        Mail::to('limokip07@gmail.com')->send(new NewsletterAdminNotification($subscriber->email));

        // Send email to subscriber
        Mail::to($subscriber->email)->send(new NewsletterWelcomeMail($subscriber->email));

        return response()->json(['success' => 'Thanks for subscribing!']);
    }
}
