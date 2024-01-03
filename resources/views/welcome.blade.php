<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sante-App</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            color: #333;
        }
        .jumbotron {
            background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%);
            color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .btn-custom {
            background-color: #fff;
            color: #3A8DFF;
            border: 2px solid #fff;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #3A8DFF;
            color: #fff;
            border: 2px solid #3A8DFF;
        }

        .feature-icon {
            color: #3A8DFF;
            margin-bottom: 15px;
        }
        .feature-icon i {
            font-size: 2rem;
        }
        .testimonial {
            background-color: #f0f0f0;
            padding: 30px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .testimonial-quote {
            font-size: 1.2rem;
            color: #555;
        }
        .testimonial-author {
            font-weight: bold;
            color: #333;
        }
        .cta {
            background-color: #4e73df;
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin: 40px 0;
            text-align: center;
        }
        .cta h2 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
@include('layouts.navigation')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    </nav>

    <div class="container my-5">
        <div class="jumbotron">
            <h1 class="display-4">Bienvenue sur Sante-App!</h1>
            <p class="lead">Votre guide global pour le coût des soins de santé et le tourisme médical.</p>
            <hr class="my-4">
            <p>Explorez les coûts des soins de santé à l'échelle mondiale et prenez des décisions éclairées concernant votre santé.</p>
            <a class="btn btn-custom btn-lg" href="#" role="button">En savoir plus</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <i class="fas fa-briefcase-medical"></i>
                </div>
                <h3>Service de Qualité</h3>
                <p>Accédez à des services de santé de haute qualité à des prix abordables.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3>Experts Qualifiés</h3>
                <p>Consultez des spécialistes renommés dans chaque domaine médical.</p>
            </div>
            <!-- Feature 3 -->
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3>Soins Personnalisés</h3>
                <p>Recevez des soins et des traitements adaptés à vos besoins personnels.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Témoignages</h2>
        <div class="testimonial">
            <p class="testimonial-quote">"Grâce à Sante-App, j'ai pu trouver une assurance santé qui correspond parfaitement à mes attentes et à mon budget."</p>
            <p class="testimonial-author">- Jeanne D., Utilisatrice de Sante-App</p>
        </div>
    </div>

    <div class="container">
        <div class="cta">
            <h2>Prêt à découvrir votre solution santé ?</h2>
            <p>Inscrivez-vous dès maintenant et rejoignez les milliers d'utilisateurs qui ont optimisé leur couverture santé avec nous.</p>
            <a class="btn btn-light btn-lg" href="{{ route('register') }}" role="button">Inscription</a>
        </div>
    </div>

    <footer class="text-center text-lg-start bg-light text-muted">
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
