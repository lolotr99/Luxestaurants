@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row mt-5">
        <h2 class="text-title"> Luxestaurants {{$restaurante->zona}}</h2>
    </div>
    <div class="row mt-4">
        <div class="col-sm-4">
                <div class="card" style="width: 100%; height: 400px">
                    <img class="card-img-top" src="{{asset('img/logo1.png')}}" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">{{$restaurante->ciudad}} - {{$restaurante->telefono}}</h4>
                    </div>
                </div>
        </div>
        <div class="col-sm-8">
            <div style="width: 100%">
                <iframe width="785" height="400" src="{{$restaurante->mapa}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    <a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Calculadora de radio del mapa</a>
                </iframe>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <h4>Rellena el formulario de reserva</h4>
    </div>
    <form method="POST" action="{{url('/reservar')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="ocultoRestaurante" value="{{$restaurante->id}}">
        <input type="hidden" name="ocultoUsuario" value="{{(Auth::user()->id)}}">
        <div class="row">
                <div class="col-sm-6">
                    <label for="nombre" class="d-flex justify-content-left">Nombre + Apellidos (*)</label>
                    <div class="input-group form-group">
                        <input type="text" id="nombre" name="nombre"  class="form-control" placeholder="Nombre y Apellidos">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="numeroPersonas" class="d-flex justify-content-left">Nº de personas (*)</label>
                    <div class="input-group form-group">
                        <input id="numeroPersonas" type="number" min="1" max="8" name="numeroPersonas" class="form-control" placeholder="Numero de Personas">
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="fecha" class="control-label">Fecha (*)</label>
                    <div class='input-group date'>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="hora" class="control-label">Hora (*)</label>
                    <div class='input-group date'>
                        <input type="time" id="hora" name="hora" min="09:00" max="23:30"  class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <input id="btnEnviar" type="submit" name="enviar" value="Enviar" class="btn btn-secundary float-left">
            </div>
        </div>
    </form>
    </div>
</div>
@endsection