<x-guest-layout>
    <!-- Session Status -->
    <!--<x-auth-session-status class="mb-4" :status="session('status')"/>

    <x-auth-validation-errors class="mb-4" :errors="$errors"/>-->

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
                    <form class="bg-transparent form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email *"
                                           value="{{old('email')}}"/>
                                    <p class="text-warning">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="Contraseña *"/>
                                    <p class="text-warning">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <div class="form-group">
                                    <label for="remember-me" class="text-warning">
                                        Recuérdame
                                    </label>
                                    <input id="remember-me" name="remember-me"
                                           type="checkbox"><br>
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
                            <div class="form-group col d-flex justify-content-center">
                                <input type="submit" name="iniciar" class="btn btn-warning rounded-pill text-white"
                                       value="Iniciar sesión"
                                       id="inicioSesion"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>