@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Acte de Santé</h1>
    <form action="{{ route('actes_sante.update', $acteSante->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $acteSante->nom }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $acteSante->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ $acteSante->prix }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="pays_id">Pays</label>
            <select class="form-control" id="pays_id" name="pays_id">
                @foreach($pays as $paysOption)
                    <option value="{{ $paysOption->id }}" {{ $acteSante->pays_id == $paysOption->id ? 'selected' : '' }}>
                        {{ $paysOption->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('actes_sante.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>
@endsection
