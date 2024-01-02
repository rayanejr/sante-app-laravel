<?php

namespace App\Http\Controllers;

use App\Models\ActeSante;
use Illuminate\Http\Request;

class ActeSanteController extends Controller
{
    public function index()
    {
        $actes = ActeSante::all();
        return view('actes_sante.index', compact('actes'));
    }

    public function create()
    {
        return view('actes_sante.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'nullable',
            'cout_moyen' => 'required|numeric',
            // Autres champs si nécessaire
        ]);

        ActeSante::create($validatedData);
        return redirect()->route('actes_sante.index')->with('success', 'Acte de santé créé avec succès.');
    }

    public function show($id)
    {
        $acte = ActeSante::findOrFail($id);
        return view('actes_sante.show', compact('acte'));
    }

    public function edit($id)
    {
        $acte = ActeSante::findOrFail($id);
        return view('actes_sante.edit', compact('acte'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'nullable',
            'cout_moyen' => 'required|numeric',
        ]);

        ActeSante::whereId($id)->update($validatedData);
        return redirect()->route('actes_sante.index')->with('success', 'Acte de santé mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $acte = ActeSante::findOrFail($id);
        $acte->delete();
        return redirect()->route('actes_sante.index')->with('success', 'Acte de santé supprimé avec succès.');
    }
}
