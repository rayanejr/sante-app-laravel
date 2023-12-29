<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            C'est une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.
        </div>

        <!-- Erreurs de Validation -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Mot de passe -->
            <div class="form-group">
                <x-label for="password" value="Mot de passe" />

                <x-input id="password" class="form-control block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="btn btn-primary">
                    Confirmer
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
