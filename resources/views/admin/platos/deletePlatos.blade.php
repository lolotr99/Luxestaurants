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
                    <label for="filtroPlatoEliminar">Ordenar por: </label>
                    <select id="filtroPlatoEliminar" name="filtroPlatoEliminar" class="form-control">
                        <option value="nombreAsc">A-Z</option>
                        <option value="nombreDesc">Z-A</option>
                        <option value="precioAsc">Más barato primero</option>
                        <option value="precioDesc">Más caro primero</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" id="platosEliminar">
            @foreach ($platos as $plato)
                <div class="row mt-5">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="text-center">
                                <img src="{{asset($plato->imagenPlato)}}" class="img-circle img-thumbnail">
                            </div><hr><br>
                        </div>
                        <div class="row mt-2">
                            <a href="{{url('/deletePlato', $plato->id)}}" onclick="return confirm('¿Estas seguro de eliminar este plato?')" class="btnAnular estiloEnlaces"><i class="fas fa-trash fa-2x"></i> Eliminar este plato</a>
                        </div>
                    </div>
                    <div class="col-sm-9 text-left">
                        <div class="tab-content">
                            <h1 class="text-title">{{$plato->nombrePlato}}</h1>
                            <hr>
                            <p class="m-0"><b>Descripción: </b> {{ $plato->descripcion}}</p>
                            <p class="m-0"><b>Precio: </b>{{$plato->precioPlato}} €</p>
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>

        <div class="row ml-5 mt-5">
            <div class="col-sm-12">
                <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
            </div>
        </div>
    </div>
@endsection
