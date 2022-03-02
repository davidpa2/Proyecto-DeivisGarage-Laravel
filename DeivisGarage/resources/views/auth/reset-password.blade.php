<x-guest-layout>
    <div id="restablecerContraseña">
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
                    </div>
                    <h1 class="text-white">Restablecer contraseña</h1>
                    <form class="bg-transparent form" action="{{ route('password.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="Repetir contraseña *"/>
                                    <p class="text-warning">
                                        @error('password_confirmation')
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
                                           value="Restablecer contraseña"
                                           id="inicioSesion"/>
                                </div>
                            </div>
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
