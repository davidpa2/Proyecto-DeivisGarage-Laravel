<x-app-layout>
    <div class="container my-4">

        <h1 class="text-white text-center pb-3">Mecánicos contratados</h1>
        <?php
        $mecanicos = DB::table('users')->get();
        ?>
        @foreach($mecanicos as $mecanico)
            <?php
            //$coches = DB::table('cars')->get()->where('user_id',Auth::id());
            $cochesMecanico = DB::table('cars')->where('user_id', $mecanico->id)->first();
            ?>
            <div class="row d-flex justify-content-center">
                <div class="card text-white" style="width:600px; background-color: rgba(219, 219, 219, 0.5);">
                    <div class="card-body">
                        <h1 class="card-title">{{$mecanico->nombre}}</h1>
                        <h2 class="card-title">{{$mecanico->apellidos}}</h2>
                        <div class="row pt-3">
                            <div class="col">
                                <p class="card-text">Dni: {{$mecanico->dni}}</p>
                            </div>
                            <div class="col">
                                <p class="card-text">Teléfono: {{$mecanico->tlf}}</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="d-flex justify-content-center col">
                                <p class="card-text">Email: {{$mecanico->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-warning rounded-pill">Editar datos</button>
                            </div>
                            <div class="col d-flex justify-content-center">
                                @if($cochesMecanico)
                                    <span class='d-inline-block' tabindex='0' data-bs-toggle='tooltip'
                                          data-bs-placement='top' title='No puedes'>
                                        <button class='btn btn-outline-danger rounded-pill text-white' type='button'
                                                disabled>Despedir mecánico
                                        </button>
                                    </span>
                                @else
                                    <form enctype="multipart/form-data" method="POST"
                                          action="{{route('user.destroy',$mecanico->id)}}"
                                          class="bg-transparent">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger rounded-pill text-white">
                                            Despedir mecánico
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach

</x-app-layout>