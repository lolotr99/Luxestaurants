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
                                <label for="filtroReservaEditar">Ordenar por</label>
                                <select id="filtroReservaEditar" class="form-control">
                                    <option value="fechaAsc">Fecha más cercana</option>
                                    <option value="fechaDesc">Fecha más lejana</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row ml-2">
                                <label for="buscadorReservasEditar">Busca por email o nombre de usuario </label>
                                <input type="text" class="form-control" id="buscadorReservasEditar" placeholder="busca por email o nombre de usuario">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="reservasEditar">
            @foreach ($reservas as $reserva)
                <div class="row mt-5">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="text-center">
                                <img src="{{asset($reserva->imagenusuario)}}" class="img-circle img-thumbnail">
                            </div><hr><br>
                        </div>
                        <div class="row mt-2">
                            <a class="btn btn-secundary" href="{{url('/updateReserva',$reserva->id)}}">Editar esta reserva</a>
                        </div>
                    </div>
                    <div class="col-sm-9 text-left">
                        <div class="tab-content">
                            <h1 class="text-title">{{$reserva->name}} ~ {{$reserva->email}}</h1>
                            <hr>
                            <p class="m-0"><b>Restaurante: </b> {{ $reserva->ciudad}} ~ {{$reserva->zona}}</p>
                            <p class="m-0"><b>Titular de la Reserva: </b>{{$reserva->nombrePersona}}</p>
                            <p class="m-0"><b>Mesa para: </b>{{$reserva->personas}} personas</p>
                            <p class="m-0"><b>Fecha y hora: </b>{{$reserva->fechaReserva->toFormattedDateString()}} a las {{ date('H:i', strtotime($reserva->fechaReserva)) }}</p>
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
