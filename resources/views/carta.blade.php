@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <div class="row ml-5 mt-5">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label for="filtroCarta">Filtar por: </label>
                                    <select id="filtroCarta" name="filtroCarta" class="form-control">
                                        <option>Seleccionar filtro</option>
                                        <option>-----------</option>
                                        <option value="entrante">Entrantes</option>
                                        <option value="plato">Platos</option>
                                        <option value="postre">Postres</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label></label>
                                    <a class="btnAnular estiloEnlaces mt-4 ml-5" href="{{url('/carta')}}"><i class="fas fa-times fa-2x"></i> Borrar filtro</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="carta">
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
        <div class="row mt-5 ml-5">
            {!! $carta->render() !!}
        </div>
    </div>

</div>
@endsection
