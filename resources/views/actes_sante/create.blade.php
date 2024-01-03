@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Acte de Santé</h1>
    <form action="{{ route('actes_sante.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="pays_id">Pays</label>
            <select class="form-control" id="pays_id" name="pays_id" required>
                @foreach($pays as $paysItem)
                    <option value="{{ $paysItem->id }}">{{ $paysItem->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
