<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingAuthController;
use App\Http\Controllers\ManagerServiceController;
use App\Http\Controllers\CustomerBookingController;
use App\Http\Controllers\ManagerBookingController;
use App\Http\Controllers\ManagerEmployeeController;
use App\Http\Controllers\AnnouncementController;
use App\Models\Announcement;

// --- PUBLIC & CUSTOMER ROUTES (Managers Blocked) ---
Route::middleware(['customer'])->group(function () {
    
    Route::get('/', function () {
        $announcements = \App\Models\Announcement::latest()->take(3)->get();
        return view('homepage', compact('announcements'));
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

    Route::get('/book', [\App\Http\Controllers\CustomerBookingController::class, 'index'])->name('book');

});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// --- ANNOUNCEMENT ROUTE ---//

Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('/manager/announcements', [AnnouncementController::class, 'index'])->name('manager.announcements.index');
    Route::post('/manager/announcements', [AnnouncementController::class, 'store'])->name('manager.announcements.store');
    Route::get('/manager/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('manager.announcements.edit');
    Route::put('/manager/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('manager.announcements.update');
    Route::delete('/manager/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('manager.announcements.destroy');
});

Route::post('/manager/announcements/update-featured', [AnnouncementController::class, 'updateFeatured'])
     ->name('manager.announcements.update-featured');

// --- Manager Routes ---
Route::middleware(['auth', 'manager'])->group(function () {
    
    // NEW: Dashboard Route pointing to the controller
    Route::get('/manager/dashboard', [ManagerBookingController::class, 'dashboard'])->name('manager.dashboard');
    
    // NEW: Booking Action Routes
    Route::post('/manager/bookings/{booking}/confirm', [ManagerBookingController::class, 'confirm'])->name('manager.bookings.confirm');
    Route::post('/manager/bookings/{booking}/decline', [ManagerBookingController::class, 'decline'])->name('manager.bookings.decline');
    Route::post('/manager/bookings/{booking}/complete', [\App\Http\Controllers\ManagerBookingController::class, 'complete'])->name('manager.bookings.complete');
    Route::post('/manager/bookings/{booking}/cancel', [\App\Http\Controllers\ManagerBookingController::class, 'cancel'])->name('manager.bookings.cancel');
    
    // Existing Service Management Routes
    Route::get('/manager/services', [ManagerServiceController::class, 'index'])->name('manager.services.index');
    Route::post('/manager/services', [ManagerServiceController::class, 'store'])->name('manager.services.store');
    Route::put('/manager/services/{service}', [ManagerServiceController::class, 'update'])->name('manager.services.update');
    Route::delete('/manager/services/{service}', [ManagerServiceController::class, 'destroy'])->name('manager.services.destroy');

    // Existing Staff Management Routes
    Route::get('/manager/employees', [ManagerEmployeeController::class, 'index'])->name('manager.employees.index');
    Route::post('/manager/employees', [ManagerEmployeeController::class, 'store'])->name('manager.employees.store');
    // NEW: Edit, Update, and Delete Routes
    Route::get('/manager/employees/{employee}/edit', [ManagerEmployeeController::class, 'edit'])->name('manager.employees.edit');
    Route::put('/manager/employees/{employee}', [ManagerEmployeeController::class, 'update'])->name('manager.employees.update');
    Route::delete('/manager/employees/{employee}', [ManagerEmployeeController::class, 'destroy'])->name('manager.employees.destroy');

    // Settings & Blackout Dates
    Route::get('/manager/settings', [\App\Http\Controllers\ManagerSettingsController::class, 'index'])->name('manager.settings');
    Route::post('/manager/settings/blackout/preview', [\App\Http\Controllers\ManagerSettingsController::class, 'previewBlackout']);
    Route::post('/manager/settings/blackout', [\App\Http\Controllers\ManagerSettingsController::class, 'storeBlackout'])->name('manager.blackout.store');
    Route::delete('/manager/settings/blackout/{blackoutDate}', [\App\Http\Controllers\ManagerSettingsController::class, 'destroyBlackout'])->name('manager.blackout.destroy');

});

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/my-bookings', [\App\Http\Controllers\ProfileController::class, 'bookings'])->name('customer.bookings');
    Route::post('/my-bookings/{booking}/cancel', [\App\Http\Controllers\ProfileController::class, 'cancelBooking'])->name('customer.bookings.cancel');

    Route::get('/my-info', [\App\Http\Controllers\ProfileController::class, 'info'])->name('customer.info');
    Route::put('/my-info', [\App\Http\Controllers\ProfileController::class, 'updateInfo'])->name('customer.info.update');
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