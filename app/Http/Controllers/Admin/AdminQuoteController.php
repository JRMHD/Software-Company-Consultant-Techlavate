<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class AdminQuoteController extends Controller
{
    /**
     * Display a listing of quote requests.
     */
    public function index(Request $request)
    {
        $query = QuoteRequest::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by timeline
        if ($request->filled('timeline')) {
            $query->where('timeline', $request->timeline);
        }

        // Filter by industry
        if ($request->filled('industry')) {
            $query->where('industry', $request->industry);
        }

        // Order by latest first
        $quotes = $query->latest()->paginate(15)->withQueryString();
        
        return view('admin.quotes.index', compact('quotes'));
    }

    /**
     * Display the specified quote request.
     */
    public function show(QuoteRequest $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }
}
