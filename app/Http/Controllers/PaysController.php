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
        return response()->json($pays);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|unique:pays|max:255',
            'indice_co2' => 'required|numeric',
        ]);

        $pay = Pays::create($validatedData);

        return response()->json($pay, 201);
    }

    public function showByCountryName($countryName)
    {
        $pays = Pays::where('nom', '=', $countryName)->first();
        if (!$pays) {
            return response()->json(['error' => 'Pays non trouvé'], 404);
        }

        $actesSante = ActeSante::where('pays_id', $pays->id)->get();

        return response()->json(['pays' => $pays, 'actesSante' => $actesSante]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|unique:pays,nom,' . $id . '|max:255',
            'indice_co2' => 'required|numeric',
        ]);

        $pays = Pays::findOrFail($id);
        $pays->update($validatedData);

        return response()->json($pays);
    }

    public function destroy($id)
    {
        $pays = Pays::findOrFail($id);
        $pays->delete();

        return response()->json(['message' => 'Pays supprimé avec succès']);
    }

    public function estimationEmpreinteCo2(Request $request)
    {
        $paysDepartId = $request->input('pays_depart');
        $paysDestinationId = $request->input('pays_destination');

        $paysDepart = Pays::find($paysDepartId);
        $paysDestination = Pays::find($paysDestinationId);

        if (!$paysDepart || !$paysDestination) {
            return response()->json(['error' => 'Informations sur les pays non disponibles'], 404);
        }

        $distance = $this->calculerDistanceEntrePays($paysDepart, $paysDestination);
        $empreinteCo2 = $this->calculerEmpreinteCarbone($distance);

        return response()->json(['empreinteCo2' => $empreinteCo2]);
    }

    private function calculerDistanceEntrePays($pays1, $pays2)
    {
        $rayonTerre = 6371; // Rayon de la Terre en kilomètres

        // Convertir les latitudes et longitudes de degrés en radians
        $lat1 = deg2rad($pays1->latitude);
        $lon1 = deg2rad($pays1->longitude);
        $lat2 = deg2rad($pays2->latitude);
        $lon2 = deg2rad($pays2->longitude);

        // Calculer les différences de latitude et longitude
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

        // Appliquer la formule de Haversine
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
            cos($lat1) * cos($lat2) *
            sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Calculer la distance
        $distance = $rayonTerre * $c;

        return $distance;
    }

    private function calculerEmpreinteCarbone($distance)
    {
        $tauxEmission = 0.2; // Par exemple
        return $distance * $tauxEmission;
    }
}
