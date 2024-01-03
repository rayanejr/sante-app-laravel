@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Recommandation</h1>
    <form action="{{ route('recommandations.update', $recommandation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $recommandation->titre }}" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="4" required>{{ $recommandation->contenu }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
