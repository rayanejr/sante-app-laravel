<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActeSante;
use App\Models\Pays;
use App\Models\Recommandation;
use App\Models\Deplacement;

class AdminController extends Controller
{
    /**
     * Renvoie les statistiques pour la page d'administration en format JSON.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Récupération de données pour les statistiques
        $nombreUtilisateurs = User::count();
        $nombreActesSante = ActeSante::count();
        $nombrePays = Pays::count();
        $nombreRecommandations = Recommandation::count();
        $nombreDeplacements = Deplacement::count();

        // Renvoyer ces données sous forme de réponse JSON
        return response()->json([
            'nombreUtilisateurs' => $nombreUtilisateurs,
            'nombreActesSante' => $nombreActesSante,
            'nombrePays' => $nombrePays,
            'nombreRecommandations' => $nombreRecommandations,
            'nombreDeplacements' => $nombreDeplacements
        ]);
    }
}
