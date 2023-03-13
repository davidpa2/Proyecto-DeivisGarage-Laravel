<x-guest-layout>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <style>
        body {
            background: black;
            color: white;
        }
    </style>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h3 class="text-center">Iniciar sesión</h3>
                            <div class="row">
                                <!-- Name -->
                                <div class="col-6">
                                    <x-label for="nombre" :value="__('Nombre')"/>

                                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                             :value="old('nombre')" required
                                             autofocus/>
                                </div>

                                <!-- Apellidos -->
                                <div class="col-6">
                                    <x-label for="apellidos" :value="__('Apellidos')"/>

                                    <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                                             :value="old('apellidos')" required
                                             autofocus/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <!-- Dni -->
                                <div class="col-6">
                                    <x-label for="dni" :value="__('DNI')"/>

                                    <x-input id="dni" class="block mt-1 w-full" type="text" name="dni"
                                             :value="old('dni')"
                                             required
                                             autofocus/>
                                </div>

                                <!-- Tlf -->
                                <div class="col-6">
                                    <x-label for="tlf" :value="__('Teléfono')"/>

                                    <x-input id="tlf" class="block mt-1 w-full" type="text" name="tlf"
                                             :value="old('tlf')"
                                             required
                                             autofocus/>
                                </div>
                            </div>
                            <!-- Email Address -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <x-label for="email" :value="__('Email')"/>

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                             :value="old('email')" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <!-- Password -->
                                <div class="col-6">
                                    <x-label for="password" :value="__('Contraseña')"/>

                                    <x-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             required autocomplete="new-password"/>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-6">
                                    <x-label for="password_confirmation" :value="__('Repetir')"/>

                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation" required/>
                                </div>
                            </div>

                            <div class="mt-4 row">
                                <div class="col">
                                    <a class=""
                                       href="{{ route('login') }}">
                                        {{ __('¿Ya registrado?') }}
                                    </a>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <x-button class="ml- btn btn-warning">
                                        {{ __('Registrar') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
