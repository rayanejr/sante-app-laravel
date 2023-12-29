<x-guest-layout>
@include('layouts.navigation')
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
</x-guest-layout>
