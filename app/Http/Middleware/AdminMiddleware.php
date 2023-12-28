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
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et est un administrateur
        if (!Auth::check() || !Auth::user()->isAdmin) {
            // Rediriger l'utilisateur s'il n'est pas administrateur
            return redirect('/home');
        }

        return $next($request);
    }
}
