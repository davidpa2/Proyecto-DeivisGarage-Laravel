<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

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
                        <form id="login-form" class="form" action="{{ route('login') }}" method="post">
                            @csrf
                            <h3 class="text-center">Iniciar sesión</h3>
                            <div class="form-group">
                                <x-label for="email" :value="__('Email')"/>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <x-label for="email" :value="__('Contraseña')"/>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-warning"><span>Remember me</span> <span><input
                                                id="remember-me" name="remember-me"
                                                type="checkbox"></span></label><br>
                            </div>
                            <div class="mt-4 row">
                                @if (Route::has('password.request'))
                                    <div class="col">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                           href="{{ route('password.request') }}">
                                            {{ __('¿Has olvidado tu contraseña?') }}
                                        </a>
                                    </div>
                                @endif
                                <div class="col d-flex justify-content-end">
                                    <input type="submit" name="submit" class="btn btn-warning btn-md"
                                           value="Iniciar sesión">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
