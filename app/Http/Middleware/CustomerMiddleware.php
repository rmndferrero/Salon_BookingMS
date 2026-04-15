<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'manager') {
            return redirect()->route('manager.dashboard')->with('error', 'Managers cannot access the customer portal.');
        }

        return $next($request);
    }
}