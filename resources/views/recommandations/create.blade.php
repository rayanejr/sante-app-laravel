@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header" style="background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%); color: white;">
            <h1>Ajouter une Nouvelle Recommandation</h1>
        </div>
        <div class="card-body" style="background-color: #f8f9fa; padding: 20px;">
            <form action="{{ route('recommandations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
