<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sante-App</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('layouts.navigation')

        <div class="container mt-4">
            <div class="jumbotron">
                <h1 class="display-4">Bienvenue sur Sante-App!</h1>
                <p class="lead">Votre guide global pour le coût des soins de santé et le tourisme médical.</p>
                <hr class="my-4">
                <p>Cette application propose une cartographie détaillée des coûts des actes médicaux à l'échelle mondiale, permettant aux utilisateurs de prendre des décisions éclairées concernant le tourisme de santé.</p>

                <h3>Fonctionnalités clés :</h3>
                <ul>
                    <li>Cartographie des coûts des soins de santé par acte médical et région.</li>
                    <li>Recommandations personnalisées pour le tourisme de santé.</li>
                    <li>Estimation de l'empreinte carbone liée aux déplacements médicaux.</li>
                    <li>Architecture WebService sécurisée avec authentification.</li>
                    <li>Disponible sur web et mobile pour une accessibilité maximale.</li>
                </ul>

                <p>Notre méthodologie repose sur une analyse approfondie des données, assurant des informations précises et actualisées pour nos utilisateurs.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Inscrivez-vous maintenant</a>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
