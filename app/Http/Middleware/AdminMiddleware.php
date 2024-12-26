<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        // IS DE GEBRUIKER EEN ADMIN?
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); 
        }

        // GEEN ADMIN = terug naar startpagina
        return redirect('/')->with('error', 'Toegang geweigerd. Enkel admins hebben toegang.');
    }
}
