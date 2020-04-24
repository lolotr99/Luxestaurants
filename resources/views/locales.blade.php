@extends('layouts.master')
@section('content')
    @foreach($arrayRestaurantes as $key => $restaurante)
        <div class="row">
            <div class="col">{{$restaurante->ciudad}}</div>
            <div class="col">{{$restaurante->zona}} {{$restaurante->telefono}}</div>
        </div>
    @endforeach
@endsection