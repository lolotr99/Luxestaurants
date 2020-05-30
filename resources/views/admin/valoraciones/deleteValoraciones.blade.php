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
                                <label for="filtroValoracionEliminar">Ordenar por: </label>
                                <select id="filtroValoracionEliminar" name="filtroValoracionEliminar" class="form-control">
                                    <option value="valorAsc">Menor puntuación</option>
                                    <option value="valorDesc">Mayor puntuación</option>
                                    <option value="fechaAsc">Más antiguo</option>
                                    <option value="fechaDesc">Más reciente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row ml-2">
                                <label for="buscadorValoracionesEliminar">Busca por email o nombre de usuario </label>
                                <input type="text" class="form-control" name="buscadorValoracionesEliminar" id="buscadorValoracionesEliminar" placeholder="busca por email o nombre de usuario">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="valoracionesEliminar">
            @foreach ($valoraciones as $valoracion)
                <div class="row mt-5">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="text-center">
                                <img src="{{asset($valoracion->imagenusuario)}}" class="img-circle img-thumbnail">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <a href="{{url('/deleteValoracion', $valoracion->id)}}" onclick="return confirm('¿Estas seguro de eliminar esta valoración?')" class="btnAnular estiloEnlaces"><i class="fas fa-trash fa-2x"></i> Eliminar esta valoración</a>
                        </div>
                    </div>
                    <div class="col-sm-6 text-left">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tab-content">
                                    <h1 class="text-title">{{$valoracion->ciudad}} ~ {{$valoracion->zona}}</h1>
                                    <hr>
                                    <p class="m-0"><b>Nombre del usuario que valora:</b> {{$valoracion->name}}</p>
                                    <p class="m-0"><b>Email del usuario que valora:</b> {{$valoracion->email}}</p>
                                    <p class="m-0"><b>Fecha de Valoración:</b> {{date('d/m/Y H:i', strtotime($valoracion->fechaValoracion))}}</p>
                                    <p class="m-0"><b>Comentario:</b> {{$valoracion->comentario}}</p>
                                    <p class="m-0"><b>Valoración: </b>
                                        <span>
                                            @for ($i = 0; $i <$valoracion->valor; $i++)
                                                <i class="text-warning fa fa-star"></i>
                                            @endfor
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="text-center">
                                <img src="{{asset($valoracion->imagenPlato)}}" class="img-circle img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-5">
            {!! $valoraciones->render() !!}
        </div>

        <div class="row ml-5 mt-5 mb-3">
            <div class="col-sm-12">
                <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
            </div>
        </div>
    </div>
@endsection
