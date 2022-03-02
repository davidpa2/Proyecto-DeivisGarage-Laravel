<div class="card text-white" style="width:600px; background-color: rgba(219, 219, 219, 0.5);">
    <div class="card-body">
        <h1 class="card-title">{{$marca}}</h1>
        <h2 class="card-title">{{$modelo}}</h2>
        <div class="row pt-3">
            <div class="col">
                <p class="card-text">Averias: {{$averias}}</p>
            </div>
            <div class="col">
                <p class="card-text">Coste: {{$coste}}€</p>
            </div>
        </div>
        <div class="row pt-3">
            <div class="d-flex justify-content-center col">
                <p class="card-text">Cliente: {{$nombreCliente}} {{$apellidosCliente}}</p>
            </div>
            <div class="d-flex justify-content-center col">
                <p class="card-text">Teléfono de contacto: {{$tlf}}</p>
            </div>
        </div>
        @if(Auth::user()->rol_id == 1)
            <div class="row pt-3">
                <div class="d-flex justify-content-center col">
                    <p class="card-text">Mecánico encargado: {{$nombreMecanico}} {{$apellidosMecanico}}</p>
                </div>
            </div>
        @endif
        <hr>
        <div class="row">
            <div class="d-flex justify-content-center col">
                <a href="{{url('factura/'.$idCoche)}}"
                   class="btn btn-warning rounded-pill">Ver
                    factura</a>
            </div>
        </div>
    </div>
</div>