<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Handle an incoming password reset link request and return JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Tentative d'envoi du lien de réinitialisation du mot de passe
        $status = Password::sendResetLink($request->only('email'));

        // Renvoie une réponse JSON en fonction du résultat
        return $status == Password::RESET_LINK_SENT
                    ? response()->json(['status' => 'reset-link-sent'])
                    : response()->json(['email' => __($status)], 422);
    }
}


