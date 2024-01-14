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
        $pays = Pays::where('nom', '=', $countryName)->first();
        $actesSante = $pays ? ActeSante::where('pays_id', $pays->id)->get() : collect();
        $tousLesPays = Pays::all();

        return view('pays.show', compact('pays', 'actesSante', 'countryName', 'tousLesPays'));
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

    public function estimationEmpreinteCo2(Request $request)
    {
        $paysDepartId = $request->input('pays_depart');
        $paysDestinationId = $request->input('pays_destination');
    
        $paysDepart = Pays::find($paysDepartId);
        $paysDestination = Pays::find($paysDestinationId);
    
        if (!$paysDepart || !$paysDestination) {
            return back()->with('erreur', 'Informations sur les pays non disponibles.');
        }
    
        $distance = $this->calculerDistanceEntrePays($paysDepart, $paysDestination);
        $empreinteCo2 = $this->calculerEmpreinteCarbone($distance);
    
        return back()->with('empreinteCo2', $empreinteCo2);
    }
    
    private function calculerDistanceEntrePays($pays1, $pays2)
    {
        // Utilisez ici les coordonnées géographiques (latitude et longitude) des capitales des pays par exemple
        $lat1 = $pays1->latitude;
        $lon1 = $pays1->longitude;
        $lat2 = $pays2->latitude;
        $lon2 = $pays2->longitude;

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        return ($miles * 1.609344); // Convertissez en kilomètres
    }

    private function calculerEmpreinteCarbone($distance)
    {
        $tauxEmission = 0.2; // Par exemple, 0.2 kg CO2 par kilomètre
        return $distance * $tauxEmission;
    }
}
