<<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">Réinitialisation du Mot de Passe</div>
                    <div class="card-body bg-light">
                        <!-- Erreurs de Validation -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <!-- Jeton de Réinitialisation du Mot de Passe -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Adresse E-mail -->
                            <div class="form-group">
                                <x-label for="email" value="E-mail" />

                                <x-input id="email" class="form-control block mt-1 w-full" 
                                         type="email" name="email" 
                                         :value="old('email', $request->email)" required autofocus />
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-group mt-4">
                                <x-label for="password" value="Nouveau mot de passe" />

                                <x-input id="password" class="form-control block mt-1 w-full" 
                                         type="password" name="password" required />
                            </div>

                            <!-- Confirmation du Mot de passe -->
                            <div class="form-group mt-4">
                                <x-label for="password_confirmation" value="Confirmer le nouveau mot de passe" />

                                <x-input id="password_confirmation" class="form-control block mt-1 w-full"
                                         type="password" name="password_confirmation" required />
                            </div>

                            <div class="form-group d-flex justify-content-end mt-4">
                                <x-button class="btn btn-primary">
                                    Réinitialiser le mot de passe
                                </x-button>
                            </div>
                        </form>
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
            background: #3490dc; /* Couleur primaire pour l'en-tête */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .card-body {
            background-color: #f8f9fa; /* Couleur de fond claire */
            padding: 40px 20px;
            color: #333; /* Couleur du texte */
        }

        .form-control {
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 25px 15px;
            border: 1px solid #ced4da;
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
    </style>

</x-guest-layout>
