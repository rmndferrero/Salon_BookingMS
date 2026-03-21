<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingAuthController;

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

// Process the form submissions
Route::post('/booking/process-user', [BookingAuthController::class, 'processUser']);
Route::post('/login', [BookingAuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\BookingAuthController::class, 'register']);