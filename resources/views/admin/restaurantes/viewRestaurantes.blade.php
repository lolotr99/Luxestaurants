@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="row ml-5 mt-5">
            <div class="col-sm-12">
                <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
            </div>
        </div>

        <div class="row mt-5 form-group">
            <label for="buscadorSelect">Buscador de locales</label>
            <input type="text"  id="buscadorSelect" class="form-control" placeholder="Busca locales por ciudad o zona" />
        </div>

        <div class="row" id="selectLocales">
            @foreach($restaurantes as $restaurante)
                <div class="row mt-5">
                    <div class="row">
                        <h2 class="text-title"> Luxestaurants {{$restaurante->zona}}</h2>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="card" style="width: 100%; height: 400px">
                                    <img class="card-img-top" src="{{asset('img/logo1.png')}}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$restaurante->ciudad}} - {{$restaurante->telefono}}</h4>
                                        <p>Mesas disponibles: {{$restaurante->numeromesas}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row ml-3">
                                <div style="width: 100%">
                                    <iframe width="785" height="400" src="{{$restaurante->mapa}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                        <a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Calculadora de radio del mapa</a>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row ml-5 mt-5">
            <div class="col-sm-12">
                <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
            </div>
        </div>
    </div>
@endsection