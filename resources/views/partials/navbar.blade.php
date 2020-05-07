<nav class="navbar navbar-expand-md bg-primary">
    <!-- Brand/logo -->
    <a class="navbar-brand ml-5" href="{{url('/')}}"><img class="imgLogo" src="{{asset('img/imgLogo.png')}}" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav text-navbar ml-5">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Luxestaurants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/locales')}}">Locales/Reservas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/carta')}}">Carta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre Nosotros</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto text-navbar mr-2">
            @if(Auth::check())

                <div class="dropdown order-1">

                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownLogout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img class="imgPerfil" src="{{asset(Auth::user()->imagenusuario)}}"/>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="dropdownLogout">
                        <a class="dropdown-item" href="{{url('/miPerfil')}}">Mi perfil</a>
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link dropdown-item" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>


                <li class="nav-item">

                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>