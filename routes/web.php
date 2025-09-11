<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $portfolios = \App\Models\Portfolio::where('is_active', true)->orderBy('sort_order')->get();
    return view('welcome', compact('portfolios'));
})->name('welcome');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Frontend subscription route
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');

// Frontend contact form route
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Static Pages
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// CV Download
Route::get('/download-cv', [PageController::class, 'downloadCV'])->name('download.cv');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::post('/testimonials/{id}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle-status');
    Route::post('/testimonials/bulk-delete', [TestimonialController::class, 'bulkDelete'])->name('testimonials.bulk-delete');
    Route::post('/testimonials/bulk-update-status', [TestimonialController::class, 'bulkUpdateStatus'])->name('testimonials.bulk-update-status');
    Route::get('/testimonials-stats', [TestimonialController::class, 'getStats'])->name('testimonials.stats');
    Route::resource('subscribers', SubscriberController::class);
    Route::post('/subscribers/{id}/toggle-status', [SubscriberController::class, 'toggleStatus'])->name('subscribers.toggle-status');
    Route::resource('contacts', ContactController::class);
    Route::post('/contacts/{contact}/update-status', [ContactController::class, 'updateStatus'])->name('contacts.update-status');
    Route::get('/contacts-stats', [ContactController::class, 'getStats'])->name('contacts.stats');
});
