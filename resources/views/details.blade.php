@extends('layouts.master')
@section('content')
<div class="container text-secondary">
    <div class="row mt-5">
        <h2 class="text-title"> Luxestaurants {{$restaurante->zona}}</h2>
    </div>
    <div class="row mt-4 mb-2">
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
    <hr>
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="text-title">Rellena el formulario de reserva</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-md-0 mb-5">
            @if(Auth::check())
            <form class="form" action="{{url('/reservar')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="ocultoRestaurante" value="{{$restaurante->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="nombre">¿Para quién es la mesa? Nombre (*)</label>
                            <input type="text" id="nombre" name="nombre"  required class="form-control" placeholder="Nombre y Apellidos">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="numeroPersonas">Nº de personas (*)</label>
                            <input id="numeroPersonas" type="number" min="1" max="8" required  name="numeroPersonas" class="form-control" placeholder="Numero de Personas">
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="datetime">Fecha y hora de reserva(*)</label>
                            <input type="text" id="datetime"  name="datetime" minlength="19" maxlength="19" readonly required onfocus="dateTime()" class="demo form-control">
                        </div>
                        <script>
                            function dateTime() {
                                var d = new Date();

                                tail.DateTime("#datetime", {
                                    dateFormat: "dd-mm-YYYY",
                                    timeFormat: "HH:ii",
                                    weekStart: 1, // Monday
                                    position: "top",
                                    dateStart: Date.now(),
                                    dateRanges: [
                                        {
                                            days: ["MON"]
                                        }
                                    ],


                                    timeHours: d.getHours(),
                                    timeMinutes: d.getMinutes(),
                                    timeSeconds: null,
                                    timeIncrement: true,
                                    timeStepHours: 1,
                                    timeStepMinutes: 30,

                                    locale: "es"
                                });

                            }
                        </script>
                    </div>
                </div>

                <div class="text-center text-md-left mt-3">
                    <input class="btn btn-secundary" type="submit" value="Aceptar">
                </div>
            </form>
            @else
                <h4 class="mt-3 text-center">Debes iniciar sesión para poder hacer reservas</h4>
            @endif
        </div>
    </div>
</div>
@endsection
