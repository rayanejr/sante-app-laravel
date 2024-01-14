<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification and return JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            // Retourner une réponse JSON indiquant que l'email est déjà vérifié
            return response()->json(['message' => 'L\'email est déjà vérifié.']);
        }

        $request->user()->sendEmailVerificationNotification();

        // Retourner une réponse JSON indiquant que le lien de vérification a été envoyé
        return response()->json(['status' => 'verification-link-sent']);
    }
}
