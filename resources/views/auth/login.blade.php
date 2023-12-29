<x-guest-layout>
@include('layouts.navigation')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">Connexion</div>
                    <div class="card-body bg-light">
                        <!-- Statut de la Session -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Erreurs de Validation -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Adresse E-mail -->
                            <div class="form-group">
                                <x-label for="email" value="E-mail" />

                                <x-input id="email" class="form-control block mt-1 w-full"
                                         type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-group mt-4">
                                <x-label for="password" value="Mot de passe" />

                                <x-input id="password" class="form-control block mt-1 w-full"
                                         type="password" name="password" required />
                            </div>

                            <!-- Se souvenir de moi -->
                            <div class="form-group block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        Mot de passe oublié ?
                                    </a>
                                @endif

                                <x-button class="btn btn-primary ml-3">
                                    Se connecter
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
