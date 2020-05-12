@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('flash::message')
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="row">
                    <div class="text-center">
                        <?php
                        ?><img src="{{asset(Auth::user()->imagenusuario)}}" class="img-circle img-thumbnail" alt="imagen de perfil del usuario">
                    </div></hr><br>
                </div>
               <div class="row">
                   <a class="btn btn-primary" href="{{url('/editarPerfil')}}">Editar Perfil</a>
               </div>
            </div>
            <div class="col-sm-9 text-left">
                <div class="tab-content">
                    <h1>DATOS DEL USUARIO</h1>
                    <hr>
                    <h1 class="h3">{{ auth()->user()->name }}</h1>
                    <p class="m-0"><b></b><i class="fas fa-mail-bulk mr-2"></i>{{ auth()->user()->email }}</p>
                    <p class="m-0"><b></b> <i class="fas fa-calendar-alt mr-2"></i>{{ auth()->user()->fechanacimiento }}</p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <section class="table-responsive">
                    <h1>Historial de Reservas de {{auth()->user()->name}}</h1>
                    @if($numeroReservas > 0)
                    <table class="table table-hover mt-5">
                        <thead>
                        <tr>
                            <th>Restaurante</th>
                            <th>Titular Reserva</th>
                            <th>Mesa para</th>
                            <th>Fecha</th>
                            <th>Descargar pdf</th>
                            <th>Anular Reserva</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservas as $value)
                            <tr>
                                <th>{{$value->zona}}- {{$value->ciudad}}</th>
                                <td>{{$value->nombrePersona}}</td>
                                <td>{{$value->personas}} personas</td>
                                <td>{{ date('d-m-Y H:i', strtotime($value->fechaReserva)) }}</td>
                                <td class="text-center"><a href="{{url('/descargarPDF', $value->id)}}" class="btnAnular"><i class="fas fa-file-download"></i></a> </td>
                                <td class="text-center"><a href="{{url('/anularReserva', $value->id)}}" class="btnAnular" onclick="return confirm('¿Estás seguro de que deseas cancelar la reserva?')"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <br><br>
                        <h5 class="text-center">ESTE USUARIO NO HA REALIZADO NINGUNA RESERVA AÚN</h5>
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection