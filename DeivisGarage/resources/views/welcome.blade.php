<x-app-layout>
    <div class="container-fluid mt-3">
        <div class="row d-flex justify-content-around">
            <div class="col-5 zona bg-transparent" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h1 class="text-white text-center">Vehículos en cola</h1>
                <?php
                //$coches = DB::table('cars')->get()->where('id',Auth::id());
                $coches = DB::table('cars')->get();
                echo Auth::id();
                ?>
                @foreach($coches as $coche)
                    <img class="coche" src="{{asset('storage/img_cars/'.$coche->foto)}}"
                         draggable="true" ondragstart="drag(event)" id="{{$coche->id}}" name="fuego"/>
                @endforeach

                <img class="coche"
                     src="https://i.pinimg.com/236x/5d/9d/3a/5d9d3a184cf865a4378844bd378d32a4--photoshop.jpg"
                     draggable="true" ondragstart="drag(event)" id="drag1" name="fuego"/>
                <img class="coche"
                     src="https://w7.pngwing.com/pngs/647/137/png-transparent-blue-car-cars-cute-cars-business-car-thumbnail.png"
                     draggable="true" ondragstart="drag(event)" id="drag2" name="agua"/>
                <img class="coche"
                     src="https://img2.freepng.es/20180717/ft/kisspng-car-door-hotel-lyon-extensible-table-top-view-5b4dd88f8a8126.9080774915318283675673.jpg"
                     draggable="true" ondragstart="drag(event)" id="drag3" name="fuego"/>
                <img class="coche"
                     src="https://img2.freepng.es/20180301/ooe/kisspng-car-chevrolet-automotive-design-download-black-cool-car-top-5a9799abdbad04.4837611815198847158998.jpg"
                     draggable="true" ondragstart="drag(event)" id="drag4" name="agua"/>
            </div>

            <div class="col-5 bg-primary zona bg-transparent">
                <h1 class="text-white text-center">Zona de reparación</h1>
                <div class="row justify-content-center">
                    <div class="col-5 plataforma" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                    <div class="col-5 plataforma" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-5 plataforma" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                </div>
            </div>
        </div>

        <div class="row my-2 d-flex justify-content-around">
            <div class="col-5 zona bg-transparent">
                <h1 class="text-white text-center">Vehículos reparados</h1>
                <div class="col-5 plataforma" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            </div>
        </div>
    </div>
</x-app-layout>