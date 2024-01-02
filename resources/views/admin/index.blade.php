@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-0 text-gray-800">Page d'Administration</h1>
        </div>
        <div class="card-body">
            <p>Bienvenue sur le tableau de bord de l'administrateur.</p>
            <div class="mb-4">
                <a href="{{ route('actes_sante.index') }}" class="btn btn-primary">Gérer les Actes de Santé</a>
                <a href="{{ route('pays.index') }}" class="btn btn-secondary">Gérer les Pays</a>
                <a href="{{ route('recommandations.index') }}" class="btn btn-success">Gérer les Recommandations</a>
                <a href="{{ route('deplacements.index') }}" class="btn btn-info">Gérer les Déplacements</a>
                <a href="{{ route('users.index') }}" class="btn btn-warning">Gérer les Utilisateurs</a>
            </div>
        </div>
    </div>
</div>
@endsection
