<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Incluez les modèles nécessaires pour les statistiques
use App\Models\User;
use App\Models\ActeSante;
use App\Models\Pays;
use App\Models\Recommandation;
use App\Models\Deplacement;

class AdminController extends Controller
{
    /**
     * Affiche la page d'administration.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupération de données pour les statistiques
        $nombreUtilisateurs = User::count();
        $nombreActesSante = ActeSante::count();
        $nombrePays = Pays::count();
        $nombreRecommandations = Recommandation::count();
        $nombreDeplacements = Deplacement::count();

        // Passer ces données à la vue
        return view('admin.index', compact('nombreUtilisateurs', 'nombreActesSante', 'nombrePays', 'nombreRecommandations', 'nombreDeplacements'));
    }

    // Autres méthodes si nécessaire
}
