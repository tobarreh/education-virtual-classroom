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
                    <li>
                        <a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
                    </li>
                    
                    @if ((Auth::check()))
                        @if (Auth::user()->type == 'admin')
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                            <li><a href="{{ route('matters.index') }}">Materias</a></li>
                            <li><a href="{{ route('grades.index') }}">Grados</a></li>
                            <li><a href="{{ route('subjects.index') }}">Asignaturas</a></li>
                            <li><a href="{{ route('topics.index') }}">Temas</a></li>
                            <li><a href="{{ route('articles.index') }}">Articulos</a></li>
                            <li><a href="{{ route('tags.index') }}">Tags</a></li>
                        @elseif (Auth::user()->type == 'professor')
                            <li><a href="{{ route('articles.index') }}">Mis articulos</a></li>
                        @elseif (Auth::user()->type == 'student')
                            <!-- Topics dropdown -->
                            @include ('template.partials.nav-topics')
                        @endif
                    @else 
                        <!-- Topics dropdown -->
                        @include ('template.partials.nav-topics')
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Ingresar</a></li>
                        <li><a href="{{ url('/register') }}">Registrarme</a></li>
                    @else
                        <li>
                            <!-- Search -->
                            @include ('template.partials.search')
                        </li>
                        <li class="dropdown">
                            <!-- Profile -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('users.edit', Auth::user()->id) }}">Editar perfil</a></li>
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