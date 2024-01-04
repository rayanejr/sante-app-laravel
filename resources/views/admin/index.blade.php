@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header" style="background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%); color: white;">
            <h1 class="h3 mb-0 text-white">Page d'Administration</h1>
        </div>
        <div class="card-body" style="background-color: #f8f9fa; padding: 20px;">
            <p>Bienvenue sur le tableau de bord administratif de Sante-APP. Cet espace est conçu pour vous donner un contrôle total et une vue d'ensemble de l'application.</p>
            <p>En tant qu'administrateur, vous pouvez gérer efficacement tous les aspects de l'application, y compris les actes de santé, les recommandations, les déplacements, et les informations relatives aux utilisateurs et aux pays. Utilisez les outils ci-dessous pour assurer une gestion fluide et efficace.</p>
            <div class="mb-4">
                <a href="{{ route('actes_sante.index') }}" class="btn btn-primary">Gérer les Actes de Santé</a>
                <a href="{{ route('pays.index') }}" class="btn btn-secondary">Gérer les Pays</a>
                <a href="{{ route('recommandations.index') }}" class="btn btn-success">Gérer les Recommandations</a>
                <a href="{{ route('deplacements.index') }}" class="btn btn-info">Gérer les Déplacements</a>
                <a href="{{ route('users.index') }}" class="btn btn-warning">Gérer les Utilisateurs</a>
            </div>
            <p>N'oubliez pas que la gestion efficace de cette plateforme contribue à offrir une meilleure expérience à tous les utilisateurs de Sante-APP. Votre rôle est essentiel dans le maintien de la qualité et de la fiabilité de notre service.</p>
        </div>
    </div>
</div>
@endsection
