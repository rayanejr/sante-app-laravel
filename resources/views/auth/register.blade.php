<x-guest-layout>
@include('layouts.navigation')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">Inscription</div>
                    <div class="card-body bg-light">
                        <!-- Erreurs de Validation -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nom -->
                            <div class="form-group">
                                <x-label for="name" value="Nom" />

                                <x-input id="name" class="form-control block mt-1 w-full" 
                                         type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Adresse E-mail -->
                            <div class="form-group mt-4">
                                <x-label for="email" value="E-mail" />

                                <x-input id="email" class="form-control block mt-1 w-full" 
                                         type="email" name="email" :value="old('email')" required />
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-group mt-4">
                                <x-label for="password" value="Mot de passe" />

                                <x-input id="password" class="form-control block mt-1 w-full"
                                         type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <!-- Confirmation du Mot de passe -->
                            <div class="form-group mt-4">
                                <x-label for="password_confirmation" value="Confirmer le mot de passe" />

                                <x-input id="password_confirmation" class="form-control block mt-1 w-full"
                                         type="password" name="password_confirmation" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    Déjà enregistré ?
                                </a>

                                <x-button class="btn btn-primary ml-4">
                                    S'inscrire
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
