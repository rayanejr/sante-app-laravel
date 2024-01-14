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
    * @param \Illuminate\Http\Request $request
    * @param \Closure $next
    * @return mixed
    */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et est un administrateur
        if (!Auth::check() || !Auth::user()->isAdmin()) {
        // Pour une API, retournez une réponse JSON avec un code d'état HTTP approprié
        return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
        return $next($request);
    }
}