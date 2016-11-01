<nav class="navbar navbar-default navbar-static-top ">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::user()->type == 'admin')
                        <li><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                        <li><a href="">Materias</a></li>
                        <li><a href="">Articulos</a></li>
                        <li><a href="">Tags</a></li>
                    @elseif (Auth::user()->type == 'professor')
                        <li><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li><a href="">Mis articulos</a></li>
                    @elseif (Auth::user()->type == 'student')
                        <li><a href="{{ route('home.index') }}">Inicio</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <!-- Search -->
                            @include('template.partials.search')
                        </li>
                        <li class="dropdown">
                            <!-- Profile -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('users.show', Auth::user()->id) }}">Perfil</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>