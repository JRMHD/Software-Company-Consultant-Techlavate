<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'message'    => 'required|string',
        ]);

        // Store in DB
        $contactMessage = ContactMessage::create($validated);

        // Send email to admin
        Mail::send('emails.contact_admin', ['data' => $contactMessage], function ($message) use ($contactMessage) {
            $message->to('limokip07@gmail.com')
                ->subject('New Contact Message Received');
        });

        return response()->json(['success' => 'Thanks for getting in touch! We will respond shortly.']);
    }
}
