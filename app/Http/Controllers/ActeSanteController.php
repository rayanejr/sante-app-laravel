<?php

namespace App\Http\Controllers;

use App\Models\ActeSante;
use Illuminate\Http\Request;
use App\Models\Pays;

class ActeSanteController extends Controller
{
    public function index()
    {
        $actesSante = ActeSante::all();
        return view('actes_sante.index', compact('actesSante'));
    }

    public function create()
    {
        $pays = Pays::all(); // Récupère tous les pays
        return view('actes_sante.create', compact('pays'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'nullable',
            'prix' => 'required|numeric',
            'pays_id' => 'required|exists:pays,id',
        ]);

        $acteSante = new ActeSante();
        $acteSante->nom = $validatedData['nom'];
        $acteSante->description = $validatedData['description'] ?? '';
        $acteSante->prix = $validatedData['prix'];
        $acteSante->pays_id = $validatedData['pays_id'];
        $acteSante->save();

        return redirect()->route('actes_sante.index')->with('success', 'Acte de Santé ajouté avec succès.');
    }

    public function show($id)
    {
        $acteSante = ActeSante::findOrFail($id);
        return view('actes_sante.show', compact('acteSante'));
    }

    public function edit($id)
    {
        $acteSante = ActeSante::findOrFail($id);
        $pays = Pays::all(); // Assurez-vous d'importer le modèle Pays
        return view('actes_sante.edit', compact('acteSante', 'pays'));
    }


    public function update(Request $request, $id)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
            'prix' => 'required|numeric',
            'pays_id' => 'required|exists:pays,id' // Assurez-vous que le pays_id correspond à un enregistrement existant dans la table 'pays'
        ]);

        // Recherche de l'acte de santé
        $acteSante = ActeSante::findOrFail($id);

        // Mise à jour de l'acte de santé avec les données validées
        $acteSante->nom = $validatedData['nom'];
        $acteSante->description = $validatedData['description'];
        $acteSante->prix = $validatedData['prix'];
        $acteSante->pays_id = $validatedData['pays_id'];

        // Enregistrement des modifications
        $acteSante->save();

        // Redirection vers la liste des actes de santé avec un message de succès
        return redirect()->route('actes_sante.index')->with('success', 'Acte de Santé mis à jour avec succès.');
    }


    public function destroy($id)
    {
        $acteSante = ActeSante::findOrFail($id);
        $acteSante->delete();

        return redirect()->route('actes_sante.index')->with('success', 'Acte de Santé supprimé avec succès.');
    }
}
