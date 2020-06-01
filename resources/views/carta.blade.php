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
                                        <option value="todos">Todos los platos</option>
                                        <option value="entrante">Entrantes</option>
                                        <option value="plato">Platos</option>
                                        <option value="postre">Postres</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="carta">
        <article>
            <section class='row'>
                <div class='col-sm-12 text-center pt-5'>
                    <h1 class='text-title text-uppercase'>ENTRANTES</h1>
                    <hr>
                </div>
            </section>

            <div class="row text-secondary">
                @foreach($carta as $plato)
                    @if($plato->categoria == "entrante")
                        <div class="col-sm-4 text-center">
                            <a class="estiloEnlaces" href="{{url('/carta',$plato->id)}}">
                                <div class="hover hover-1">
                                    <img class="imgCarta" src="{{asset($plato->imagenPlato)}}"/>
                                </div>
                                <span>{{$plato->nombrePlato}}</span>
                                <img src="{{asset('img/ir.png')}}"/>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </article>
        <article>
            <section class='row'>
                <div class='col-sm-12 text-center pt-5'>
                    <h1 class='text-title text-uppercase'>PLATOS</h1>
                    <hr>
                </div>
            </section>

            <div class="row text-secondary">
                @foreach($carta as $plato)
                    @if($plato->categoria == "plato")
                        <div class="col-sm-4 text-center">
                            <a class="estiloEnlaces" href="{{url('/carta',$plato->id)}}">
                                <div class="hover hover-1">
                                    <img class="imgCarta" src="{{asset($plato->imagenPlato)}}"/>
                                </div>
                                <span>{{$plato->nombrePlato}}</span>
                                <img src="{{asset('img/ir.png')}}"/>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </article>
        <article>
            <section class='row'>
                <div class='col-sm-12 text-center pt-5'>
                    <h1 class='text-title text-uppercase'>POSTRES</h1>
                    <hr>
                </div>
            </section>

            <div class="row text-secondary">
                @foreach($carta as $plato)
                    @if($plato->categoria == "postre")
                        <div class="col-sm-4 text-center">
                            <a class="estiloEnlaces" href="{{url('/carta',$plato->id)}}">
                                <div class="hover hover-1">
                                    <img class="imgCarta" src="{{asset($plato->imagenPlato)}}"/>
                                </div>
                                <span>{{$plato->nombrePlato}}</span>
                                <img src="{{asset('img/ir.png')}}"/>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </article>

    </div>

</div>
@endsection
