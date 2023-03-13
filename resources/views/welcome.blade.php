<x-app-layout>
    <div class="container-fluid mt-3">
        <div class="row d-flex justify-content-around">
            <div class="col-5 zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h1 class="text-white text-center">Vehículos en cola</h1>
                <?php
                $coches = DB::table('cars')->get()->where('estado', 'en cola');
                ?>
                @foreach($coches as $coche)
                    <?php
                    $mecanico = DB::table('users')->where('id', $coche->user_id)->first();
                    ?>
                    <span class='d-inline-block' tabindex='0' data-bs-toggle='tooltip'
                          data-bs-placement='top'
                          title='-{{$coche->marca}} {{$coche->modelo}}       -Mecánico asignado: {{$mecanico->nombre}} {{$mecanico->apellidos}}
                          @if($mecanico->id != Auth::id() && Auth::user()->rol_id != 1)-No puedes actualizar un coche que no has registrado tú
                                  @else
                                  -Arrastra a la siguiente zona para comenzar reparación
                                  @endif
                                  '>
                    <img class="coche" src="{{asset('storage/img_cars/'.$coche->foto)}}"
                         @if($mecanico->id == Auth::id() || Auth::user()->rol_id == 1)
                         draggable="true"
                         @else
                         draggable="false"
                         @endif
                         ondragstart="drag(event)" id="{{$coche->id}}"/>
                    </span>
            @endforeach

            <!--<img class="coche"
                     src="https://i.pinimg.com/236x/5d/9d/3a/5d9d3a184cf865a4378844bd378d32a4--photoshop.jpg"
                     draggable="true" ondragstart="drag(event)" id="drag1"/>
                <img class="coche"
                     src="https://w7.pngwing.com/pngs/647/137/png-transparent-blue-car-cars-cute-cars-business-car-thumbnail.png"
                     draggable="true" ondragstart="drag(event)" id="drag2"/>
                <img class="coche"
                     src="https://img2.freepng.es/20180717/ft/kisspng-car-door-hotel-lyon-extensible-table-top-view-5b4dd88f8a8126.9080774915318283675673.jpg"
                     draggable="true" ondragstart="drag(event)" id="drag3"/>
                <img class="coche"
                     src="https://img2.freepng.es/20180301/ooe/kisspng-car-chevrolet-automotive-design-download-black-cool-car-top-5a9799abdbad04.4837611815198847158998.jpg"
                     draggable="true" ondragstart="drag(event)" id="drag4"/>-->
            </div>

            <div class="col-5 bg-primary zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h1 class="text-white text-center">Zona de reparación</h1>
                <?php
                $coches = DB::table('cars')->get()->where('estado', 'reparacion');
                ?>
                @foreach($coches as $coche)
                    <?php
                    $mecanico = DB::table('users')->where('id', $coche->user_id)->first();
                    ?>
                    <span class='d-inline-block' tabindex='0' data-bs-toggle='tooltip'
                          data-bs-placement='top'
                          title='-{{$coche->marca}} {{$coche->modelo}}       -Mecánico asignado: {{$mecanico->nombre}} {{$mecanico->apellidos}}
                          @if($mecanico->id != Auth::id() && Auth::user()->rol_id != 1)-No puedes actualizar un coche que no has registrado tú
                                  @else
                                  -Arrastra a la siguiente zona para terminar reparación
                                  @endif
                                  '>
                    <img class="coche" src="{{asset('storage/img_cars/'.$coche->foto)}}"
                         @if($mecanico->id == Auth::id() || Auth::user()->rol_id == 1)
                         draggable="true"
                         @else
                         draggable="false"
                         @endif
                         ondragstart="drag(event)" id="{{$coche->id}}"/>
                    </span>
                @endforeach
            </div>
        </div>
        <div class="row my-2 d-flex justify-content-around">
            <!--<div class="col-5 zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">-->
            <div class="col-5 zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h1 class="text-white text-center">Vehículos reparados</h1>
                <?php
                $coches = DB::table('cars')->get()->where('estado', 'completado')->where('costeReparacion', null);
                ?>
                @foreach($coches as $coche)
                    <img class="coche" src="{{asset('storage/img_cars/'.$coche->foto)}}"
                         draggable="false" ondragstart="drag(event)" id="{{$coche->id}}"/>
                    <a href="{{url('factura/'.$coche->id)}}"
                       class="btn btn-warning rounded-pill">Ver
                        factura</a>
                @endforeach
            </div>
        </div>
</x-app-layout>