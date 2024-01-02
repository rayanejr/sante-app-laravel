<?php
namespace App\Http\Controllers;

use App\Models\Deplacement;
use Illuminate\Http\Request;

class DeplacementController extends Controller
{
    public function index()
    {
        $deplacements = Deplacement::all();
        return view('deplacements.index', compact('deplacements'));
    }

    public function create()
    {
        return view('deplacements.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validez et définissez vos champs ici, par exemple:
            'user_id' => 'required|exists:users,id',
            'pays_id' => 'required|exists:pays,id',
            'date_depart' => 'required|date',
            'date_retour' => 'required|date',
            'empreinte_co2' => 'required|numeric',
        ]);

        Deplacement::create($validatedData);
        return redirect()->route('deplacements.index')->with('success', 'Déplacement créé avec succès.');
    }

    public function show($id)
    {
        $deplacement = Deplacement::findOrFail($id);
        return view('deplacements.show', compact('deplacement'));
    }

    public function edit($id)
    {
        $deplacement = Deplacement::findOrFail($id);
        return view('deplacements.edit', compact('deplacement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Validez et définissez vos champs ici, par exemple:
            'user_id' => 'required|exists:users,id',
            'pays_id' => 'required|exists:pays,id',
            'date_depart' => 'required|date',
            'date_retour' => 'required|date',
            'empreinte_co2' => 'required|numeric',
        ]);

        Deplacement::whereId($id)->update($validatedData);
        return redirect()->route('deplacements.index')->with('success', 'Déplacement mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $deplacement = Deplacement::findOrFail($id);
        $deplacement->delete();
        return redirect()->route('deplacements.index')->with('success', 'Déplacement supprimé avec succès.');
    }
}
