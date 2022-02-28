<nav class="navbar navbar-expand-sm navbar-light bg-butano">
    <div class="container-fluid">
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
                <a class="nav-link" href="route('taller')" :active="request()->routeIs('dashboard')">Reparaciones</a>
            </x-nav-link>
            <x-nav-link class="nav-item">
                <a class="nav-link" href="{{route('mecanicos')}}" :active="request()->routeIs('dashboard')">Mecánicos</a>
            </x-nav-link>
            <x-nav-link class="nav-item">
                <a class="nav-link" href="{{route('registrarMecanico')}}" :active="request()->routeIs('dashboard')">Contratar mecánico</a>
            </x-nav-link>
        </ul>

        @auth
            <form method="POST" action="{{ route('logout') }}" class="w-25">
                @csrf
                <?php echo "Usuario: " . Auth::id(); ?>
                <button href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Cerrar
                    sesión
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            <a href="{{ route('register') }}"
               class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endauth
    </div>
</nav>
