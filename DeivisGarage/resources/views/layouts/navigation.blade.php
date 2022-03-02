<nav class="navbar navbar-expand-sm navbar-light bg-butano">
    <div class="container-fluid row">
        <div class="col-6">
            <ul class="navbar-nav">
                <x-nav-link class="nav-item">
                    <a class="nav-link active" href="{{route('taller')}}"
                       :active="request()->routeIs('taller')">DeivisGarage</a>
                </x-nav-link>
                <x-nav-link class="nav-item">
                    <a class="nav-link" href="{{route('registrarCoche')}}" :active="request()->routeIs('dashboard')">Nuevo
                        coche</a>
                </x-nav-link>
                <x-nav-link class="nav-item">
                    <a class="nav-link" href="{{route('historial')}}" :active="request()->routeIs('dashboard')">Reparaciones</a>
                </x-nav-link>
                <x-nav-link class="nav-item">
                    <a class="nav-link" href="{{route('mecanicos')}}" :active="request()->routeIs('dashboard')">Mecánicos</a>
                </x-nav-link>
                <x-nav-link class="nav-item">
                    <a class="nav-link" href="{{route('registrarMecanico')}}" :active="request()->routeIs('dashboard')">Contratar
                        mecánico</a>
                </x-nav-link>
            </ul>
        </div>

        <div class="col-6">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-flex justify-content-end">
                    @csrf
                    <?php
                    if (Auth::user()->rol_id == 1) {
                        echo "Bienvenido administrador";
                    } else {
                        echo "Bienvenido: " . Auth::user()->nombre . " " . Auth::user()->apellidos;
                    } ?>
                    <button href="{{ route('logout') }}" class="btn btn-dark rounded-pill ms-4">Cerrar
                        sesión
                    </button>
                </form>
            @else
                <div class="d-flex justify-content-end">
                    <a href="{{ route('login') }}" class="btn btn-dark rounded-pill">Log
                        in</a>
                </div>
            @endauth
        </div>
    </div>
</nav>