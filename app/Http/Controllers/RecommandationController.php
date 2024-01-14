<?php

namespace App\Http\Controllers;

use App\Models\Recommandation;
use Illuminate\Http\Request;

class RecommandationController extends Controller
{
    public function index()
    {
        $recommandations = Recommandation::all();
        return response()->json($recommandations);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            // Autres champs si nécessaire
        ]);

        $recommandation = Recommandation::create($validatedData);
        return response()->json(['message' => 'Recommandation créée avec succès.', 'recommandation' => $recommandation], 201);
    }

    public function show($id)
    {
        $recommandation = Recommandation::findOrFail($id);
        return response()->json($recommandation);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            // Autres champs si nécessaire
        ]);

        Recommandation::whereId($id)->update($validatedData);
        return response()->json(['message' => 'Recommandation mise à jour avec succès.']);
    }

    public function destroy($id)
    {
        $recommandation = Recommandation::findOrFail($id);
        $recommandation->delete();
        return response()->json(['message' => 'Recommandation supprimée avec succès.']);
    }
}
