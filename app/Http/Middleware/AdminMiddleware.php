<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Not logged in: send to admin login page
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login sebagai admin.');
        }

        // Logged in but not admin: send to user login page
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('user.login')
                ->with('error', 'Akses admin saja. Silakan login sebagai user.');
        }

        return $next($request);
    }
}
