<x-guest-layout>
    <div id="olvidarContraseña">
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
                            <p>
                                ¿Has olvidado tu constraseña? No te preocupes. Escribe tu email y te mandaremos un
                                enlace para que puedas elegir una nueva.
                            </p>
                        </div>
                    </div>
                    <h1 class="text-white">Restablecer contraseña</h1>
                    <form class="bg-transparent form" action="{{ route('password.email') }}" method="post">
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


                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group d-flex justify-content-around">
                                    <input type="submit" name="iniciar" class="btn btn-warning rounded-pill text-white"
                                           value="Email para restablecer contraseña"
                                           id="inicioSesion"/>
                                    <a href="{{ route('login') }}"
                                       class="btn btn-outline-warning text-white rounded-pill text-sm text-gray-700 dark:text-gray-500 underline me-3">Volver</a>
                                </div>
                            </div>
                        </div>
                        <x-auth-session-status class="text-warning my-4" :status="session('status')"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
