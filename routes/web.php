<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingAuthController;
use App\Http\Controllers\ManagerServiceController;

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
    
    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard');
    
    Route::get('/manager/services', [ManagerServiceController::class, 'index'])->name('manager.services.index');
    Route::post('/manager/services', [ManagerServiceController::class, 'store'])->name('manager.services.store');
    Route::put('/manager/services/{service}', [ManagerServiceController::class, 'update'])->name('manager.services.update');
    Route::delete('/manager/services/{service}', [ManagerServiceController::class, 'destroy'])->name('manager.services.destroy');
});

// Process the form submissions
Route::post('/booking/process-user', [BookingAuthController::class, 'processUser']);
Route::post('/login', [BookingAuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\BookingAuthController::class, 'register']);
Route::post('/logout', [BookingAuthController::class, 'logout'])->name('logout');