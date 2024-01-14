<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request and return JSON response.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Vous pouvez personnaliser la réponse en fonction du rôle de l'utilisateur
        // Par exemple, retourner des informations supplémentaires pour un administrateur
        if (Auth::user()->isAdmin()) {
            return response()->json(['message' => 'Connecté en tant qu\'administrateur', 'user' => Auth::user()]);
        }

        // Pour les autres utilisateurs, renvoyez une réponse JSON générique
        return response()->json(['message' => 'Connexion réussie', 'user' => Auth::user()]);
    }
    /**
     * Destroy an authenticated session and return JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => 'Déconnexion réussie']);
    }
}