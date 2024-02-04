@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Déplacement</h1>
    <form action="{{ route('deplacements.update', $deplacement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">Utilisateur ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $deplacement->user_id }}" required>
        </div>
        <div class="form-group">
            <label for="pays_id">Pays ID</label>
            <input type="number" class="form-control" id="pays_id" name="pays_id" value="{{ $deplacement->pays_id }}" required>
        </div>
        <div class="form-group">
            <label for="date_depart">Date de Départ</label>
            <input type="date" class="form-control" id="date_depart" name="date_depart" value="{{ $deplacement->date_depart }}" required>
        </div>
        <div class="form-group">
            <label for="date_retour">Date de Retour</label>
            <input type="date" class="form-control" id="date_retour" name="date_retour" value="{{ $deplacement->date_retour }}" required>
        </div>
        <div class="form-group">
            <label for="empreinte_co2">Empreinte CO2</label>
            <input type="number" class="form-control" id="empreinte_co2" name="empreinte_co2" value="{{ $deplacement->empreinte_co2 }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
