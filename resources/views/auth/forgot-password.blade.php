<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Réinitialisation du mot de passe</div>
                    <div class="card-body">
                        <p class="mb-4">
                            Vous avez oublié votre mot de passe ? Pas de problème. 
                            Indiquez-nous simplement votre adresse e-mail et nous vous enverrons un lien 
                            de réinitialisation de mot de passe qui vous permettra de choisir un nouveau.
                        </p>

                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Adresse E-mail -->
                            <div class="form-group">
                                <x-label for="email" value="E-mail" />
                                <x-input id="email" class="form-control" 
                                         type="email" name="email" 
                                         :value="old('email')" required autofocus />
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <x-button class="btn btn-primary">
                                    Envoyer le lien de réinitialisation du mot de passe
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
            background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%);
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .card-body {
            background-color: #fff;
            padding: 40px 20px;
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

        .text-sm {
            font-size: 0.875rem;
        }
    </style>
</x-guest-layout>