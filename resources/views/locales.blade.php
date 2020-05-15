@extends('layouts.master')
@section('content')
    <div class="container text-secondary mt-2">
        <h1 class="text-title mt-3">Reservas/Locales</h1>
        <section class="container">
            <div class="row">
                <span>Para solicitar su reserva, rellene el formulario de reserva. Se le otorgará un documento, el cuál será necesario para la entrada al restaurante.
                    Se puede anular la reserva del mismo hasta las 00:00 del día anterior a la fecha reservada.</span>
            </div>

            <div class="row mt-3 form-group">
                <input type="text" name="buscador" id="buscador" class="form-control" placeholder="Busca locales por ciudad o zona" />
            </div>
        </section>
        <section id="locales" class="mt-5">
    @foreach($arrayRestaurantes as $key => $restaurante)
            <div class="row mb-3 text-uppercase" style="background: #F9F9F9;">
                <div class="col-4">
                    <h4>{{$restaurante->ciudad}}</h4>
                </div>
                <div class="col-8">
                    <h5><a class="estiloEnlaces" href="{{url('/locales',$restaurante->id)}}">{{$restaurante->zona}}</a>  • {{$restaurante->telefono}}</h5>
                </div>
            </div>
    @endforeach
        </section>
    </div>
@endsection