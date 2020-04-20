<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #e3a364 ">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('img/imgLogo.png')}}" alt="logo" style="width:40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())

                <div class="dropdown" id="dropdownLogoutLI" class="dropdown order-1">

                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p id="dropdownLogoutMenu1"></p>
                        <img src="<?php echo (Auth::user()->imagenusuario)?>" style="width: 40px; height: 40px;"/>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Mi perfil</a>
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
                    <a class="nav-link" href="{{url('/login')}}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}">Registrarse</a>
                </li>
            @endif
        </ul>
    </div>
</nav>