@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header" style="background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%); color: white;">
            <h1>Modifier la Recommandation</h1>
        </div>
        <div class="card-body" style="background-color: #f8f9fa; padding: 20px;">
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
    </div>
</div>
@endsection
