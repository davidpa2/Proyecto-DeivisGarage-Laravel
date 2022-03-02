<x-app-layout>
    <div class="container my-4">
        <h1 class="text-center text-white pb-3">
            @if(Auth::user()->rol_id == 1)
                Historial de reparaciones
            @else
                Mis reparaciones
            @endif
        </h1>

        @if(Auth::user()->rol_id == 1)
            <?php
            $coches = DB::table('cars')->get()->where('estado', 'completado')->where('costeReparacion', !null);
            ?>
        @else
            <?php
            $coches = DB::table('cars')->get()->where('estado', 'completado')->where('costeReparacion', !null)->where('user_id', Auth::id());
            ?>
        @endif

        @foreach($coches as $coche)
            <?php
            //$coches = DB::table('cars')->get()->where('user_id',Auth::id());
            $cocheCliente = DB::table('clients')->where('id', $coche->client_id)->first();
            $mecanico = DB::table('users')->where('id', $coche->user_id)->first();
            ?>
            <div class="row d-flex justify-content-center">
                <x-tarjetaReparacion marca="{{$coche->marca}}" modelo="{{$coche->modelo}}"
                                     averias="{{$coche->descripcionAveria}}" coste="{{$coche->costeReparacion}}"
                                     nombreCliente="{{$cocheCliente->nombre}}"
                                     apellidosCliente="{{$cocheCliente->apellidos}}" tlf="{{$cocheCliente->tlf}}"
                                     idCoche="{{$coche->id}}"
                                     nombreMecanico="{{$mecanico->nombre}}" apellidosMecanico="{{$mecanico->apellidos}}"
                ></x-tarjetaReparacion>
            </div>
        @endforeach
    </div>
</x-app-layout>