<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\QuoteRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Counts
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $totalQuotes = QuoteRequest::count();
        $totalContacts = ContactMessage::count();
        
        // Recent Counts (Last 30 days)
        $recentUsers = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $recentPosts = Post::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $recentQuotes = QuoteRequest::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $recentContacts = ContactMessage::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        
        // Growth Percentages
        $usersGrowth = $this->calculateGrowth(User::class);
        $postsGrowth = $this->calculateGrowth(Post::class);
        $quotesGrowth = $this->calculateGrowth(QuoteRequest::class);
        $contactsGrowth = $this->calculateGrowth(ContactMessage::class);
        
        // Chart Data - Last 7 days
        $last7Days = collect(range(6, 0))->map(function ($days) {
            return Carbon::now()->subDays($days)->format('M d');
        });
        
        $usersChartData = $this->getChartData(User::class, 7);
        $postsChartData = $this->getChartData(Post::class, 7);
        $quotesChartData = $this->getChartData(QuoteRequest::class, 7);
        $contactsChartData = $this->getChartData(ContactMessage::class, 7);
        
        // Recent Activity
        $recentActivity = $this->getRecentActivity();
        
        // Top Blog Posts by Views
        $topPosts = Post::where('is_published', true)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
        
        // Latest Users
        $latestUsers = User::latest()->take(5)->get();
        
        // Latest Quote Requests
        $latestQuotes = QuoteRequest::latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalUsers', 'totalPosts', 'totalQuotes', 'totalContacts',
            'recentUsers', 'recentPosts', 'recentQuotes', 'recentContacts',
            'usersGrowth', 'postsGrowth', 'quotesGrowth', 'contactsGrowth',
            'last7Days', 'usersChartData', 'postsChartData', 'quotesChartData', 'contactsChartData',
            'recentActivity', 'topPosts', 'latestUsers', 'latestQuotes'
        ));
    }
    
    private function calculateGrowth($model)
    {
        $currentMonth = $model::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $lastMonth = $model::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        
        if ($lastMonth == 0) {
            return $currentMonth > 0 ? 100 : 0;
        }
        
        return round((($currentMonth - $lastMonth) / $lastMonth) * 100, 1);
    }
    
    private function getChartData($model, $days)
    {
        $data = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $count = $model::whereDate('created_at', $date)->count();
            $data[] = $count;
        }
        return $data;
    }
    
    private function getRecentActivity()
    {
        $activities = collect();
        
        // Recent Users
        User::latest()->take(3)->get()->each(function ($user) use ($activities) {
            $activities->push([
                'type' => 'user',
                'icon' => 'fa-user-plus',
                'color' => 'primary',
                'message' => "New user registered: {$user->name}",
                'time' => $user->created_at
            ]);
        });
        
        // Recent Posts
        Post::latest()->take(3)->get()->each(function ($post) use ($activities) {
            $activities->push([
                'type' => 'post',
                'icon' => 'fa-pen-nib',
                'color' => 'success',
                'message' => "New blog post: {$post->title}",
                'time' => $post->created_at
            ]);
        });
        
        // Recent Quotes
        QuoteRequest::latest()->take(3)->get()->each(function ($quote) use ($activities) {
            $activities->push([
                'type' => 'quote',
                'icon' => 'fa-file-invoice',
                'color' => 'warning',
                'message' => "New quote request from {$quote->name}",
                'time' => $quote->created_at
            ]);
        });
        
        // Recent Contacts
        ContactMessage::latest()->take(3)->get()->each(function ($contact) use ($activities) {
            $activities->push([
                'type' => 'contact',
                'icon' => 'fa-envelope',
                'color' => 'info',
                'message' => "New contact message from {$contact->name}",
                'time' => $contact->created_at
            ]);
        });
        
        return $activities->sortByDesc('time')->take(10)->values();
    }
}
