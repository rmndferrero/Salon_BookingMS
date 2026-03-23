<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // If they are not logged in, or they are NOT a manager, kick them back to the homepage
        if (!Auth::check() || Auth::user()->role !== 'manager') {
            return redirect('/')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}