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
                                <label for="filtroPlatoEditar">Ordenar por: </label>
                                <select id="filtroPlatoEditar" name="filtroPlatoEditar" class="form-control">
                                    <option value="nombreAsc">A-Z</option>
                                    <option value="nombreDesc">Z-A</option>
                                    <option value="precioAsc">Más barato primero</option>
                                    <option value="precioDesc">Más caro primero</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row ml-2">
                                <label for="buscadorPlatosEditar">Busca por nombre de plato </label>
                                <input type="text" class="form-control" name="buscadorPlatosEditar" id="buscadorPlatosEditar" placeholder="busca por nombre de plato">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="platosEditar">
            @foreach ($platos as $plato)
                <div class="row mt-5">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="text-center">
                                <img src="{{asset($plato->imagenPlato)}}" class="img-circle img-thumbnail">
                            </div><hr><br>
                        </div>
                        <div class="row mt-2">
                            <a class="btn btn-secundary" href="{{url('/updatePlato',$plato->id)}}">Editar este plato</a>
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

        <div class="row mt-5">
            {!! $platos->render() !!}
        </div>

        <div class="row ml-5 mt-5 mb-3">
            <div class="col-sm-12">
                <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
            </div>
        </div>
    </div>
@endsection
