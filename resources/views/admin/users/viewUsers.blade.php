@extends('layouts.master')
@section('content')
<div class="container text-secondary">
    <div class="row">
        @include('flash::message')
    </div>
    <div class="row ml-5 mt-5">
        <div class="col-sm-12">
            <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label for="filtro">Ordenar por: </label>
                            <select id="filtro" name="filtro" class="form-control">
                                <option value="nombreAsc">A-Z</option>
                                <option value="nombreDesc">Z-A</option>
                                <option value="fechaDesc">Jóvenes Primero</option>
                                <option value="fechaAsc">Mayores Primero</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row ml-2">
                            <label for="buscadorUsers">Busca por email o nombre de usuario </label>
                            <input type="text" class="form-control" name="buscadorUsers" id="buscadorUsers" placeholder="busca por email o nombre de usuario">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="usuarios">
        @foreach ($usuarios as $usuario)
            <div class="row mt-5">
                <div class="col-sm-3">
                    <div class="row">
                        <div class="text-center">
                            <img src="{{asset($usuario->imagenusuario)}}" class="img-circle img-thumbnail" alt="imagen de perfil del usuario">
                        </div><hr><br>
                    </div>
                </div>
                <div class="col-sm-9 text-left">
                    <div class="tab-content">
                        <h1 class="text-title">Datos de {{$usuario->email}}</h1>
                        <hr>
                        <p class="m-0"><b>Nombre Usuario:</b> {{ $usuario->name}}</p>
                        <p class="m-0"><b>Fecha de Nacimiento:</b> {{ date('d/m/Y', strtotime($usuario->fechanacimiento))}}</p>
                        <p class="m-0"><b>Rol:</b> {{$usuario->rol}}</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    </div>

    <div class="row mt-5">
        {!! $usuarios->render() !!}
    </div>

    <div class="row ml-5 mt-5 mb-3">
        <div class="col-sm-12">
            <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
        </div>
    </div>
</div>
@endsection
