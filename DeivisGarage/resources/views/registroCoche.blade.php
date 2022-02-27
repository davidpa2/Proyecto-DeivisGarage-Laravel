<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">
            {{ __('Mi coche') }}
            @if(session('error')==1)
                Error de base de datos
            @endif
        </h2>
    </x-slot>
    <div class="container bg-transparent contact-form my-5">
        <div class="cabeceraImg">
            <img src="https://previews.123rf.com/images/djvstock/djvstock1709/djvstock170905146/85691310-destornillador-e-%C3%ADcono-de-la-llave-inglesa-.jpg"/>
        </div>
        <form enctype="multipart/form-data" method="POST" action="{{route('car.store')}}" class="bg-transparent">
            @csrf
            <div class="row mb-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="marca" class="form-control" placeholder="Marca *" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="modelo" class="form-control" placeholder="Modelo *" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="km" class="form-control" placeholder="Kilómetros *" value=""/>
                    </div>
                    <div class="form-group">
                        <?php
                        $clientes = DB::table('clients')->get();
                        ?>
                        <select class="form-select form-control border-white" name="client_id">
                            <option class="text-dark" selected>Selecciona un cliente</option>
                            @foreach($clientes as $cliente)
                                <option
                                    @if(session('cliente') == $cliente->id)
                                        selected
                                    @endif
                                    value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellidos}} -- {{$cliente->dni}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="averias" class="form-control" placeholder="Nº averías *" value=""/>
                    </div>
                    <div class="form-group">
                    <textarea name="descAveria" class="form-control" placeholder="Descripción de la avería *"
                              style="width: 100%; height: 115px;"></textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-4">
                    <img class="imgCoche" id="imgCoche"
                         src="https://thumbs.dreamstime.com/b/coche-realista-en-la-oscuridad-front-view-97098400.jpg">
                </div>
                <div class="form-group col-md-8 d-flex justify-content-center align-self-center">
                    <input type="file" name="fotoCoche" class="form-control" value="Añadir coche" id="fotoCocheInput"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="form-group col-md-6 d-flex justify-content-center">
                    <input type="submit" name="annadirCoche" class="btn btn-warning rounded-pill" value="Añadir coche"
                           id="btnAnnadirCoche"/>
                </div>
                <div class="form-group col-md-6 d-flex justify-content-center">
                    <input type="button" name="nuevoCliente" class="btn btn-outline-warning rounded-pill"
                           value="¿Nuevo cliente?" id="btnNuevoCliente"/>
                </div>
            </div>
        </form>

        <form enctype="multipart/form-data" method="POST" action="{{route('client.store')}}" id="formNewClient"
              class="bg-transparent
              <?php if (session('errorCliente')) {
                  echo "d-block";
              } else {
                  echo "d-none";
              }?>">
            @csrf
            <div class="row mb-1">
                <div class="form-group col-md-6">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre *" :value="old('nombre')"/>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos *" :value="old('apellidos')"/>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="dni" class="form-control" placeholder="DNI *" :value="old('dni')"/>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="tlf" class="form-control" placeholder="Teléfono *" :value="old('tlf')"/>
                </div>
                <div class="form-group col">
                    <input type="text" name="email" class="form-control" placeholder="Email *" :value="old('email')"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="form-group col d-flex justify-content-center">
                    <input type="submit" name="nuevoCliente" class="btn btn-warning rounded-pill"
                           value="Completar registro"/>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>