<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::view('/404', '404');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/faq', 'faq');
Route::view('/implementation-strategy', 'implementation-strategy');
Route::view('/services', 'services');
Route::view('/industries', 'industries');
Route::view('/quote', 'quote');
Route::fallback(function () {
    return response()->view('404', [], 404);
});

Route::post('/quote-request', [QuoteController::class, 'submit'])->name('quote.submit');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/newsletter-subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
