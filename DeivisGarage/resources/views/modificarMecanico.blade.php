<x-app-layout>
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
                <h1 class="text-white">Modificar un mecánico</h1>

                <form enctype="multipart/form-data" method="POST" action="{{route('user.update',$mecanico)}}"
                      class="bg-transparent">
                    @csrf
                    @method('PUT')
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre *"
                                       value="{{$mecanico->nombre}}"/>
                                <p class="text-warning">
                                    @error('nombre')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos *"
                                       value="{{$mecanico->apellidos}}"/>
                                <p class="text-warning">
                                    @error('apellidos')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="dni" class="form-control" placeholder="DNI *"
                                       value="{{$mecanico->dni}}"/>
                                <p class="text-warning">
                                    @error('dni')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="tlf" class="form-control" placeholder="Teléfono *"
                                       value="{{$mecanico->tlf}}"/>
                                <p class="text-warning">
                                    @error('tlf')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email *"
                                       value="{{$mecanico->email}}"/>
                                <p class="text-warning">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col d-flex justify-content-center">
                            <input type="submit" name="modificar" class="btn btn-warning rounded-pill"
                                   value="Modificar mecánico" id="modificar"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>