<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">
            {{ __('Mi coche') }}
            @if(session('error')==1)
                Error de base de datos
            @endif
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-3 d-flex justify-content-end">
                <img src="{{asset('/storage/images/taller.jpg')}}" alt="tallercito" class="pancarta">
            </div>
            <div class="col-3">
                <div class="row text-white mb-5">
                    <div class="col-6">
                        <h1>DeivisGarage</h1>
                    </div>
                    <div class="col-6">
                        <img src="{{asset('/storage/images/herramientas.png')}}" alt="logo" class="logo">
                    </div>
                </div>
                <h1 class="text-white">Registrar nuevo mecánico</h1>
                <form enctype="multipart/form-data" method="POST" action="{{route('user.store')}}" class="bg-transparent">
                    @csrf
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre *" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos *"
                                       value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="dni" class="form-control" placeholder="DNI *" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="tlf" class="form-control" placeholder="Teléfono *" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email *" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control" placeholder="Contraseña *"
                                       value="" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col d-flex justify-content-center">
                            <input type="submit" name="iniciar" class="btn btn-warning rounded-pill"
                                   value="Registrar mecánico" id="registrar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>