<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// 1. Process the guest booking form OR account creation
Route::post('/booking/process-user', [BookingAuthController::class, 'processUser']);

// 2. Log in returning registered users
Route::post('/login', [BookingAuthController::class, 'login']);

// 3. A test route to get the currently authenticated user (requires login)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});