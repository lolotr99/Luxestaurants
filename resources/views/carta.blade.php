@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row text-secondary">
        @foreach($carta as $plato)
            <div class="col-sm-4 text-center">
               <a class="estiloEnlaces" href="{{url('/carta',$plato->id)}}">
                   <div class="hover hover-1">
                        <img class="imgCarta" src="{{asset($plato->imagenPlato)}}"/>
                    </div>
                   <span>{{$plato->nombrePlato}}</span>
                   <img src="{{asset('img/ir.png')}}"/>
               </a>
            </div>
        @endforeach
    </div>
</div>
@endsection