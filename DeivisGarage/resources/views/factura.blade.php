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

    <?php
    $cliente = DB::table('clients')->get()->where('id', $coche->client_id);
    ?>

    <div class="container mt-4" id="impresion">
        <div class="row d-flex justify-content-center">
            <h1 class="white-title text-center">Datos del cliente:</h1>
            <div class="col-4 text-white">
                <p>Nombre: David</p>
                <p>DNI: 27435365G</p>
                <p>Gmail: parejoteelgrandavid@gmail.com</p>
            </div>
            <div class="col-2 text-white">
                <p>Apellidos: Parejo Aliaga</p>
                <p>Teléfono: 684 434 831</p>
                <p>Mecánico: Manuel Padilla</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center pt-4">
            <h1 class="white-title text-center">Datos del vehículo</h1>
            <div class="col-4 text-white">
                <p>Marca: {{$coche->marca}}</p>
                <p>Kilómetros: 14749 km</p>

            </div>
            <div class="col-2 text-white">
                <p>Modelo: Punto</p>
                <p>Averías: 3</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6 text-white">Descripción de las averías:<br>
                <ul>
                    <li>Pérdida de agua por el fuelle que conecta el motor con el radiador</li>
                    <li>Cambio de aceite y filtro del aire</li>
                    <li>Error en los pilotos traseros</li>
                </ul>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-4 d-flex justify-content-center">
            <div class="col-3 d-flex justify-content-center">
                <button (click)="imprimir()" name="nuevoCliente" class="btn btn-warning rounded-pill"
                        value="Imprimir factura">Imprimir factura
                </button>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <button routerLink="/PerfilUsuario" name="nuevoCliente" class="btn btn-outline-warning rounded-pill"
                        value="Imprimir factura">Volver
                </button>
            </div>
        </div>
    </div>
</x-app-layout>