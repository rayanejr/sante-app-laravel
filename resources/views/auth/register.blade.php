<x-guest-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-header text-center" style=" background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%); color: #ffffff; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <h2 class="my-3">Rejoignez-nous</h2>
                    </div>
                    <div class="card-body" style=" background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%); padding: 2rem; ">
                        <!-- Erreurs de Validation -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nom -->
                            <div class="form-group">
                                <x-label for="name" :value="__('Full Name')" />
                                <x-input id="name" class="form-control"
                                         type="text" name="name" :value="old('name')" required autofocus placeholder="Your name" style="border-radius: 10px;"/>
                            </div>

                            <!-- Adresse E-mail -->
                            <div class="form-group mt-4">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="form-control"
                                         type="email" name="email" :value="old('email')" required placeholder="Your email" style="border-radius: 10px;"/>
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-group mt-4">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="form-control"
                                         type="password" name="password" required autocomplete="new-password" placeholder="Create a password" style="border-radius: 10px;"/>
                            </div>

                            <!-- Confirmation du Mot de passe -->
                            <div class="form-group mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input id="password_confirmation" class="form-control"
                                         type="password" name="password_confirmation" required placeholder="Confirm your password" style="border-radius: 10px;"/>
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between mt-4">
                                <a class="text-muted" href="{{ route('login') }}" style="text-decoration: none; color: #ffff;">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-button class="btn btn-block" style=" background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%); color: #ffffff; border-radius: 20px; padding: 10px 30px;">
                                    {{ __('Sign Up') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            overflow: hidden; /* Ensure the border-radius is respected */
            color : #fff
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }
        .form-control, .form-control:focus {
            border: none;
            box-shadow: none;
            transition: background-color 0.3s ease;
            
        }
        .form-control:focus {
            background-color: #ffecef;
        }
        .btn:hover {
            background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%);
        }
        .card-header h2 {
            font-weight: 600;
            
        }
        .text-muted {
            color: #6c757d;
        }
        .my-3 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</x-guest-layout>
