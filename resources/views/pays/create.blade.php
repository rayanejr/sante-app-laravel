@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Pays</h1>

    <form method="POST" action="{{ route('pays.store') }}">
        @csrf

        <div class="form-group">
            <label for="nom">Nom du Pays</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
            <label for="indice_co2">Indice CO2</label>
            <input type="number" class="form-control" id="indice_co2" name="indice_co2" required>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
