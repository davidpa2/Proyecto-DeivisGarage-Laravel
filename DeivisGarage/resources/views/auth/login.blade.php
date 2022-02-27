<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <div id="login">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-3 d-flex justify-content-end">
                    <img src="{{asset('/storage/images/taller.jpg')}}" alt="tallercito" class="pancarta">
                </div>
                <div class="col-3">
                    <div class="row text-white">
                        <div class="col-6">
                            <h1>DeivisGarage</h1>
                        </div>
                        <div class="col-6 mb-3">
                            <img src="{{asset('/storage/images/herramientas.png')}}" alt="logo" class="logo">
                        </div>
                        <div class="col mt-1">
                            <p>El software de gestión de talleres mecánicos que te brindará una interfaz
                                minimalista y simple para hacer tu trabajo más eficiente.
                            </p>
                        </div>
                    </div>
                    <h1 class="text-white">Iniciar sesión</h1>
                    <form class="bg-transparent" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email *"
                                           value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Contraseña *"
                                           value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <label for="remember-me" class="text-warning"><span>Remember me</span> <span><input
                                                    id="remember-me" name="remember-me"
                                                    type="checkbox"></span></label><br>
                                </div>
                            </div>
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
                        </div>


                        <div class="row mt-4">
                            <div class="form-group col-md-6 d-flex justify-content-end">
                                <input type="submit" name="iniciar" class="btn btn-warning rounded-pill"
                                       value="Iniciar sesión"
                                       id="inicioSesion"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('login') }}" method="post">
                            @csrf
                            <h3 class="text-center">Iniciar sesión</h3>
                            <div class="form-group">
                                <x-label for="email"/>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <x-label for="email"/>
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