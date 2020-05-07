@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($carta as $value)
            <div class="col-sm-4 text-center">
                <div class="hover hover-1">
                    <img class="imgCarta" src="{{asset($value->imagenPlato)}}"/>
                </div>
                <span class="text-general">{{$value->nombrePlato}}</span>
            </div>
        @endforeach
    </div>
</div>
@endsection