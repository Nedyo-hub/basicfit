<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{

    public function handle($request, Closure $next)
{
    if (!auth()->user()->isAdmin()) {
        return redirect('/')->with('error', 'Je hebt geen toegang tot deze pagina.');
    }

    return $next($request);
}

    
}
