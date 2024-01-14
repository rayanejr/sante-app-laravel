<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified and return JSON response.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            // L'email est déjà vérifié
            return response()->json(['message' => 'Email already verified.']);
        }

        if ($request->user()->markEmailAsVerified()) {
            // Déclencher l'événement de vérification
            event(new Verified($request->user()));
        // Email vérifié avec succès
        return response()->json(['message' => 'Email verified successfully.']);
        }

        // En cas d'échec de la vérification
        return response()->json(['message' => 'Unable to verify email.'], 422);
    }
}