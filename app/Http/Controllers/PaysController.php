<?php
namespace App\Http\Controllers;

use App\Models\Pays;
use Illuminate\Http\Request;
use App\Models\ActeSante;

class PaysController extends Controller
{
    public function index()
    {
        $pays = Pays::all();
        return view('pays.index', compact('pays'));
    }

    public function create()
    {
        return view('pays.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|unique:pays|max:255',
            'indice_co2' => 'required|numeric',
        ]);

        $pay = new Pays();
        $pay->nom = $validatedData['nom'];
        $pay->indice_co2 = $validatedData['indice_co2'];
        $pay->save();

        return redirect()->route('pays.index')->with('success', 'Pays ajouté avec succès.');
    }

    public function showByCountryName($countryName)
{
    $pays = Pays::where('nom', $countryName)->first();
    
    if ($pays) {
        $actesSante = ActeSante::where('pays_id', $pays->id)->get();
    } else {
        $actesSante = collect(); // Crée une collection vide
    }

    return view('pays.show', compact('pays', 'actesSante', 'countryName'));
}

    public function edit($id)
    {
        $pay = Pays::findOrFail($id);
        return view('pays.edit', compact('pay')); // Assurez-vous que c'est 'pay' et non 'pays'
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|unique:pays,nom,' . $id . '|max:255',
            'indice_co2' => 'required|numeric',
        ]);

        $pay = Pays::findOrFail($id);
        $pay->nom = $validatedData['nom'];
        $pay->indice_co2 = $validatedData['indice_co2'];
        $pay->save();

        return redirect()->route('pays.index')->with('success', 'Pays mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $pays = Pays::findOrFail($id);
        $pays->delete();
        return redirect()->route('pays.index')->with('success', 'Pays supprimé avec succès.');
    }
}
