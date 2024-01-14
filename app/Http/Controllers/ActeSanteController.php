<?php

namespace App\Http\Controllers;

use App\Models\ActeSante;
use Illuminate\Http\Request;
use App\Models\Pays;

class ActeSanteController extends Controller
{
    // Retourne tous les actes de santé en format JSON
    public function index()
    {
        $actesSante = ActeSante::all();
        return response()->json($actesSante);
    }

    // Enregistre un nouvel acte de santé
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'nullable',
            'prix' => 'required|numeric',
            'pays_id' => 'required|exists:pays,id',
        ]);

        $acteSante = ActeSante::create($validatedData);
        return response()->json($acteSante, 201); // 201 = Created
    }

    // Affiche un acte de santé spécifique
    public function show($id)
    {
    $acteSante = ActeSante::findOrFail($id);
    return response()->json($acteSante);
    }
    
    // Met à jour un acte de santé
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
            'prix' => 'required|numeric',
            'pays_id' => 'required|exists:pays,id',
        ]);

        $acteSante = ActeSante::findOrFail($id);
        $acteSante->update($validatedData);

        return response()->json($acteSante);
    }

    // Supprime un acte de santé
    public function destroy($id)
    {
        $acteSante = ActeSante::findOrFail($id);
        $acteSante->delete();

        return response()->json(null, 204); // 204 = No Content
    }
}
