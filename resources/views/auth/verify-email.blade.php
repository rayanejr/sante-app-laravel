<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">Vérification de l'E-mail</div>
                    <div class="card-body bg-light">
                        <p class="mb-4 text-dark">
                            Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.
                            </div>
                        @endif

                        <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <x-button class="btn btn-primary">
                                        Renvoyer l'E-mail de Vérification
                                    </x-button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn-logout">
                                    Se Déconnecter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1200px;
            padding: 20px;
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
            background: #3490dc; /* Couleur primaire comme dans les autres pages */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .card-body {
            background-color: #f8f9fa; /* Couleur de fond claire */
            padding: 40px 20px;
            color: #333; /* Couleur du texte */
        }

        .btn-primary {
            background-color: #3490dc;
            border: none;
            padding: 15px 30px;
            border-radius: 20px;
            font-size: 1rem;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #2779bd;
        }
        
        .btn-logout {
            background-color: #dc3545; /* Rouge pour le déconnexion */
            color: #fff; /* Texte blanc */
            border: none;
            padding: 15px 30px;
            border-radius: 20px;
            font-size: 1rem;
            
        }

        .btn-logout:hover {
            background-color: #c82333; /* Un rouge légèrement plus foncé au survol */
        }

        .text-gray-600 {
            color: #718096;
        }

        .text-gray-600:hover {
            color: #1a202c;
        }

        .text-green-600 {
            color: #38a169;
        }
    </style>
</x-guest-layout>