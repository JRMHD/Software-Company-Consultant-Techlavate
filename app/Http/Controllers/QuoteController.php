<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteAdminMail;
use App\Mail\QuoteUserMail;



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
        Mail::to('limokip07@gmail.com')->send(new QuoteAdminMail($quote));

        // Send confirmation email to user
        Mail::to($quote->email)->send(new QuoteUserMail($quote));

        return response()->json(['success' => 'Quote request submitted successfully.']);
    }
}
