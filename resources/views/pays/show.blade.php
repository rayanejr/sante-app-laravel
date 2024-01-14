@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Actes de Santé en {{ $pays->nom ?? $countryName }}
            </h2>
        </div>
        <div class="card-body">
            @if($pays)
                <p class="card-text">Voici les actes de santé disponibles dans ce pays :</p>
                @forelse($actesSante as $acte)
                    <div class="card mb-3">
                        <div class="card-header">{{ $acte->nom }}</div>
                        <div class="card-body">
                            Prix: {{ number_format($acte->prix, 2, ',', ' ') }}€
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">Aucun acte de santé disponible pour ce pays.</div>
                @endforelse
            @else
                <div class="alert alert-info">Aucune donnée existante pour le pays "{{ $countryName }}".</div>
            @endif
            <hr>
            <h3>Estimation de l'Empreinte Carbone pour le Voyage</h3>
            <form action="{{ route('estimation_co2') }}" method="POST">
                @csrf
                <input type="hidden" name="pays_destination" value="{{ $pays->id ?? '' }}">
                <div class="form-group">
                    <label for="pays_depart">Sélectionnez votre pays de départ :</label>
                    <select class="form-control" id="pays_depart" name="pays_depart">
                        @foreach($tousLesPays as $paysDepart)
                            <option value="{{ $paysDepart->id }}">{{ $paysDepart->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Estimer l'Empreinte Carbone</button>
            </form>


            @if (session('empreinteCo2'))
                <div class="alert alert-success">
                    Empreinte carbone estimée pour le voyage : {{ session('empreinteCo2') }} kg CO2
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

<style>
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }
    .card-header {
        background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%);
        color: #fff;
        padding: 20px;
    }
    .card-body {
        background-color: #fff;
        padding: 20px 40px;
    }
    .alert-info {
        background-color: #d1ecf1;
        border-color: #bee5eb;
    }
    .container {
        max-width: 1200px;
    }
</style>
