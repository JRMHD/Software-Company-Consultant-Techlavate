<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

Route::get('/', function () {
    $posts = \App\Models\Post::where('is_published', true)
        ->whereNotNull('published_at')
        ->latest('published_at')
        ->take(6)
        ->get();
    return view('welcome', compact('posts'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    
    // User Management
    Route::resource('admin/users', \App\Http\Controllers\Admin\AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    
    // Quote Requests
    Route::get('admin/quotes', [\App\Http\Controllers\Admin\AdminQuoteController::class, 'index'])->name('admin.quotes.index');
    Route::get('admin/quotes/{quote}', [\App\Http\Controllers\Admin\AdminQuoteController::class, 'show'])->name('admin.quotes.show');
    
    // Contact Messages
    Route::get('admin/contacts', [\App\Http\Controllers\Admin\AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('admin/contacts/{contact}', [\App\Http\Controllers\Admin\AdminContactController::class, 'show'])->name('admin.contacts.show');

    // Blog Posts
    Route::resource('admin/posts', \App\Http\Controllers\Admin\AdminPostController::class)->names([
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'show' => 'admin.posts.show',
        'edit' => 'admin.posts.edit',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.destroy',
    ]);
});

require __DIR__ . '/auth.php';

Route::view('/404', '404');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/faq', 'faq');
Route::view('/implementation-strategy', 'implementation-strategy');
Route::view('/services', 'services');
Route::view('/industries', 'industries');
Route::view('/recruiting', 'recruiting');
Route::view('/quote', 'quote');

// Public Blog Routes
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

Route::fallback(function () {
    return response()->view('404', [], 404);
});

Route::post('/quote-request', [QuoteController::class, 'submit'])->name('quote.submit');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/newsletter-subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
