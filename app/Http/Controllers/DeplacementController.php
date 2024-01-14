<?php
namespace App\Http\Controllers;

use App\Models\Deplacement;
use Illuminate\Http\Request;

class DeplacementController extends Controller
{
    // Retourne tous les déplacements en format JSON
    public function index()
    {
        $deplacements = Deplacement::all();
        return response()->json($deplacements);
    }

    // Enregistre un nouveau déplacement
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pays_id' => 'required|exists:pays,id',
            'date_depart' => 'required|date',
            'date_retour' => 'required|date',
            'empreinte_co2' => 'required|numeric',
        ]);

        $deplacement = Deplacement::create($validatedData);
        return response()->json($deplacement, 201); // 201 = Created
    }

    // Affiche un déplacement spécifique
    public function show($id)
    {
        $deplacement = Deplacement::findOrFail($id);
        return response()->json($deplacement);
    }

    // Met à jour un déplacement
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pays_id' => 'required|exists:pays,id',
            'date_depart' => 'required|date',
            'date_retour' => 'required|date',
            'empreinte_co2' => 'required|numeric',
        ]);

        $deplacement = Deplacement::findOrFail($id);
        $deplacement->update($validatedData);

        return response()->json($deplacement);
    }

    // Supprime un déplacement
    public function destroy($id)
    {
        $deplacement = Deplacement::findOrFail($id);
        $deplacement->delete();

        return response()->json(null, 204); // 204 = No Content
    }
}

