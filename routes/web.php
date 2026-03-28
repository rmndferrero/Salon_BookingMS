<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingAuthController;
use App\Http\Controllers\ManagerServiceController;
use App\Http\Controllers\CustomerBookingController;
use App\Http\Controllers\ManagerBookingController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/book', function () {
    return view('booking');
})->name('book');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// --- Manager Routes ---
Route::middleware(['auth', 'manager'])->group(function () {
    
    // NEW: Dashboard Route pointing to the controller
    Route::get('/manager/dashboard', [ManagerBookingController::class, 'dashboard'])->name('manager.dashboard');
    
    // NEW: Booking Action Routes
    Route::post('/manager/bookings/{booking}/confirm', [ManagerBookingController::class, 'confirm'])->name('manager.bookings.confirm');
    Route::post('/manager/bookings/{booking}/decline', [ManagerBookingController::class, 'decline'])->name('manager.bookings.decline');
    
    // Existing Service Management Routes
    Route::get('/manager/services', [ManagerServiceController::class, 'index'])->name('manager.services.index');
    Route::post('/manager/services', [ManagerServiceController::class, 'store'])->name('manager.services.store');
    Route::put('/manager/services/{service}', [ManagerServiceController::class, 'update'])->name('manager.services.update');
    Route::delete('/manager/services/{service}', [ManagerServiceController::class, 'destroy'])->name('manager.services.destroy');
});

// --- BOOKING ROUTES (Publicly accessible) ---
Route::get('/book', [CustomerBookingController::class, 'index'])->name('book');

// THIS IS THE ROUTE LARAVEL IS LOOKING FOR:
Route::post('/book', [CustomerBookingController::class, 'store'])->name('booking.store'); 

// THIS IS THE API ROUTE WE JUST ADDED:
Route::get('/api/availability', [CustomerBookingController::class, 'getAvailability'])->name('api.availability');

// --- AUTH ROUTES ---
Route::post('/booking/process-user', [BookingAuthController::class, 'processUser']);
Route::post('/login', [BookingAuthController::class, 'login']);
Route::post('/register', [BookingAuthController::class, 'register']);
Route::post('/logout', [BookingAuthController::class, 'logout'])->name('logout');