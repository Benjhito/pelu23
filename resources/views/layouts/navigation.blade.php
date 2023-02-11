<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <!--div class="container"-->
        <a class="navbar-brand" href="{{ url('/') }}">ncp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('clients.index') }}">Gestión de Clientes</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proveedores</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('providers.index') }}">Gestión de Proveedores</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('products.index') }}">Gestión de Productos</a>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    @guest
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ingreso</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (Route::has('login'))
                                <a class="dropdown-item" href="{{ route('login') }}">Entrar</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                            @endif
                        </div>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </li>
            </ul>
        </div>
    <!--/div-->
</nav>
