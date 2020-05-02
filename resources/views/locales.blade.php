@extends('layouts.master')
@section('content')
    <div class="container text-general">
        <h1 class="text-title">Reservas/Locales</h1>
        <section class="container">
            <div class="row">
                <span>Para solicitar su reserva, rellene el formulario de reserva. Se le otorgará un documento, el cuál será necesario para la entrada al restaurante.
                    Se puede anular la reserva del mismo en cualquier momento sin problema.</span>
            </div>
        </section>
        <section class="mt-3">
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