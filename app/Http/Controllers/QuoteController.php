<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function submit(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'company_size' => 'required|string',
            'industry' => 'required|string',
            'timeline' => 'required|string',
            'services' => 'required|array|min:1',
            'services.*' => 'string',
            'other_services' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Store in DB
        $quote = new QuoteRequest();
        $quote->company_name = $validated['company_name'];
        $quote->email = $validated['email'];
        $quote->phone = $validated['phone'] ?? null;
        $quote->company_size = $validated['company_size'];
        $quote->industry = $validated['industry'];
        $quote->timeline = $validated['timeline'];
        $quote->services = json_encode($validated['services']);
        $quote->other_services = $validated['other_services'] ?? null;
        $quote->message = $validated['message'];
        $quote->save();

        // Send email to admin
        $adminEmail = env('ADMIN_EMAIL');

        Mail::send('emails.quote_admin', ['quote' => $quote], function ($message) use ($quote, $adminEmail) {
            $message->to($adminEmail)
                ->subject('New Quote Request from ' . $quote->company_name);
        });

        // Send confirmation email to user
        Mail::send('emails.quote_user', ['quote' => $quote], function ($message) use ($quote) {
            $message->to($quote->email)
                ->subject('We Received Your Quote Request');
        });

        return response()->json(['success' => 'Quote request submitted successfully.']);
    }
}
