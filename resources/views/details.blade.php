@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <h2 class="text-title"> Luxestaurants {{$restaurante->zona}}</h2>
    </div>
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-8">
            <div style="width: 100%">
                <iframe width="785" height="400" src="{{$restaurante->mapa}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    <a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Calculadora de radio del mapa</a>
                </iframe>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
@endsection