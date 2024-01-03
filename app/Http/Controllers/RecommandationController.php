<?php

namespace App\Http\Controllers;

use App\Models\Recommandation;
use Illuminate\Http\Request;

class RecommandationController extends Controller
{
    public function index()
    {
        $recommandations = Recommandation::all();
        return view('recommandations.index', compact('recommandations'));
    }

    public function create()
    {
        return view('recommandations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            // Autres champs si nécessaire
        ]);

        Recommandation::create($validatedData);
        return redirect()->route('recommandations.index')->with('success', 'Recommandation créée avec succès.');
    }

    public function show($id)
    {
        $recommandation = Recommandation::findOrFail($id);
        return view('recommandations.show', compact('recommandation'));
    }

    public function edit($id)
    {
        $recommandation = Recommandation::findOrFail($id);
        return view('recommandations.edit', compact('recommandation'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            // Autres champs si nécessaire
        ]);

        Recommandation::whereId($id)->update($validatedData);
        return redirect()->route('recommandations.index')->with('success', 'Recommandation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $recommandation = Recommandation::findOrFail($id);
        $recommandation->delete();
        return redirect()->route('recommandations.index')->with('success', 'Recommandation supprimée avec succès.');
    }
}

