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

                        <!-- Statut de la Session -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Erreurs de Validation -->
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
</x-guest-layout>
