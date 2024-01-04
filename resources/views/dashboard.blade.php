<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sante-APP') }} - Acceuil</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #ffffff;
            color: #333;
        }
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
            text-align: center;
            border-radius: 20px 20px 0 0;
        }
        .card-body {
            background-color: #f8f9fa;
            padding: 40px 20px;
            color: #333;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Bienvenue sur Sante-APP!
                </h2>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Découvrez une nouvelle ère de gestion de la santé avec Sante-APP - votre partenaire fiable pour une vie plus saine et heureuse. Notre application révolutionnaire offre une approche holistique pour gérer vos besoins de santé, en mettant à votre disposition des fonctionnalités intuitives et personnalisables.
                </p>
                <p class="card-text">
                    Avec Sante-APP, prenez le contrôle de votre santé en suivant vos rendez-vous médicaux, en gérant votre dossier médical, et en accédant à des conseils de santé personnalisés. Notre plateforme connecte les utilisateurs avec un réseau d'experts médicaux, permettant une communication fluide et des consultations en ligne. 
                </p>
                <p class="card-text">
                    Que vous cherchiez à améliorer votre bien-être général, à suivre un traitement spécifique, ou simplement à rester informé sur les dernières tendances en matière de santé, Sante-APP est l'outil qu'il vous faut. Inscrivez-vous dès maintenant et commencez votre parcours vers une meilleure santé.
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
