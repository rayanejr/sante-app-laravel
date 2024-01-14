<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConfirmablePasswordController extends Controller
{
    /**
     * Confirm the user's password and return JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (!Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            // Retourner une réponse JSON en cas d'échec de la validation
            throw ValidationException::withMessages([
                'password' => [__('auth.password')],
            ]);
        }

        // Mettre à jour la session pour confirmer que le mot de passe a été vérifié
        $request->session()->put('auth.password_confirmed_at', time());

        // Retourner une réponse JSON pour indiquer le succès de l'opération
        return response()->json(['message' => 'Mot de passe confirmé avec succès']);
    }
}

