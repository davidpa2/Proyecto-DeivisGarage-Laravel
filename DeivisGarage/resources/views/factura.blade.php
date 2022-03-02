<x-app-layout>
    <!-- La plantilla de impresión no se muestra en la vista, sólo sirve para mostrarla en el documento a imprimir-->
    <div id="plantillaImpresion" class="d-none">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <h1 class="d-flex justify-content-start">DeivisGarage</h1>
                <p class="">"Su taller por exelencia y experiencia"</p>
            </div>
            <div class="col">
                <h2 class="d-flex justify-content-end">Factura</h2>
            </div>
        </div>
    </div>

    <div id="plantillaImpresion2" class="d-none">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <hr>
                <p class="text-white text-center">Firma del mecánico:</p>
            </div>
        </div>
    </div>

    <div id="plantillaImpresion3" class="d-none">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <p class="text-white text-center" id="pCoste"></p>
            </div>
        </div>
    </div>


    <div class="container mt-4" id="impresion">
        <div class="row d-flex justify-content-center">
            <h1 class="white-title text-center">Datos del cliente:</h1>
            <div class="col-4 text-white">
                <p>Nombre: {{$cliente->nombre}}</p>
                <p>DNI: {{$cliente->dni}}</p>
                <p>Gmail: {{$cliente->email}}</p>
            </div>
            <div class="col-3 text-white">
                <p>Apellidos: {{$cliente->apellidos}}</p>
                <p>Teléfono: {{$cliente->tlf}}</p>
                <p>Mecánico: {{Auth::user()->nombre}} {{Auth::user()->apellidos}}</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center pt-4">
            <h1 class="white-title text-center">Datos del vehículo</h1>
            <div class="col-4 text-white">
                <p>Marca: {{$coche->marca}}</p>
                <p>Kilómetros: {{$coche->km}} km</p>

            </div>
            <div class="col-3 text-white">
                <p>Modelo: {{$coche->modelo}}</p>
                <p>Averías: {{$coche->averias}}</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-7 text-white">Descripción de las averías:<br>
                <p>{{$coche->descripcionAveria}}</p>
                <!--<ul>
                    <li>Pérdida de agua por el fuelle que conecta el motor con el radiador</li>
                    <li>Cambio de aceite y filtro del aire</li>
                    <li>Error en los pilotos traseros</li>
                </ul>-->
                <hr>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-2">
        <div class="col-1">
            <label for="costeAveria" class="text-white">Coste de reparación:</label>
        </div>
        <div class="col-2">
            <input type="number" name="costeAveria" id="costeAveria" class="form-control text-center"
                   placeholder="Coste (€)"
                   @if($coche->costeReparacion != null)
                   value="{{$coche->costeReparacion}}" disabled="true"
                   style="background: transparent"
                    @endif
            />
        </div>

    </div>

    <div class="container">
        <div class="row my-4 d-flex justify-content-center">
            <div class="col-3 d-flex justify-content-center">
                <button disabled="true" onclick="imprimir(costeAveria.value)" name="imprimir" id="imprimir"
                        class="btn btn-warning rounded-pill" type="button"
                        value="Imprimir factura">Imprimir factura
                </button>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="{{route('taller')}}" name="nuevoCliente" class="btn btn-outline-warning rounded-pill"
                   value="Imprimir factura">Volver
                </a>
            </div>
        </div>
    </div>

    <p id="idCoche" class="d-none">{{$coche->id}}</p>
</x-app-layout>