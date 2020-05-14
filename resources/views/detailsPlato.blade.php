@extends('layouts.master')
@section('content')
    <div class="container-fluid text-secondary">
        <div class="row ml-5 mt-5">
            <div class="col-sm-12">
                <a class="estiloEnlaces" href="{{url('/carta')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a carta</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 mt-5">
                <article class="row mt-5  mx-auto">
                    <div class="col-sm-12">
                        <h1 class="text-title text-uppercase">{{$plato->nombrePlato}}</h1>
                        <h3 class="text-title">{{$plato->precioPlato}} €</h3>
                        <p class="text-justify">{{$plato->descripcion}}</p>
                    </div>
                </article>
            </div>
            <aside class="col-sm-7 mt-5">
                <img class="img-fluid imgPlato" src="{{asset($plato->imagenPlato)}}"/>
            </aside>
        </div>

        <div class="row mt-5 mb-3 text-center">
            <div class="col-12">
                <hr>
                <h1><a class="text-title enlacesSinEstilo" data-toggle="collapse" href="#valoraciones" aria-expanded="false" aria-controls="valoraciones">Valoraciones ({{$nValoraciones}})</a></h1>
                <div class="collapse" id="valoraciones">
                        <div class="container-fluid">
                            <div class="row bootstrap snippets">
                                <div class="col-md-12 col-md-offset-2 col-sm-12">
                                    <div class="comment-wrapper">
                                        <div class="panel panel-info">
                                            <div class="panel-body mt-3">
                                                @if(Auth::check())
                                                    @if(count($restaurantes) == 0)
                                                        <span class="text-danger">No has probado este plato porque no has hecho ninguna reserva en nuestros restaurantes</span>
                                                    @else
                                                        <form action="{{url('/valorar')}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{$plato->id}}" name="ocultoPlato">
                                                        <textarea name="comentario" class="form-control" placeholder="escribe un comentario..." rows="3"></textarea>
                                                        <p class="clasificacion">
                                                            <input id="radio1" type="radio" name="estrellas" value="5" checked><!--
                                                        --><label for="radio1">★</label><!--
                                                        --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                                                        --><label for="radio2">★</label><!--
                                                        --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                                                        --><label for="radio3">★</label><!--
                                                        --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                                                        --><label for="radio4">★</label><!--
                                                        --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                                                        --><label for="radio5">★</label>
                                                        </p>
                                                        <select id="restaurante" name="restaurante" class="form-control">
                                                            @foreach($restaurantes as $restaurante)
                                                                <option value="{{$restaurante->id}}">{{$restaurante->ciudad}} ~ {{$restaurante->zona}}</option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                        <input type="submit" class="btn btn-primary pull-right" value="Valorar">
                                                    </form>
                                                    @endif
                                                @else
                                                    <h4 class="mt-3">Debes iniciar sesión para poder hacer valoraciones</h4>
                                                @endif
                                                    <div class="clearfix"></div>
                                                    <hr>
                                                    @if ($nValoraciones > 0)
                                                    <ul class="media-list">
                                                        @foreach ($valoraciones as $valoracion)
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{asset($valoracion->imagenusuario)}}"  class="imgLogo">
                                                                </a>
                                                                <div class="media-body">
                                                                <span class="text-muted pull-right">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <small class="text-muted">{{$valoracion->fechaValoracion}}</small>
                                                                        </div>
                                                                       @if (Auth::check())
                                                                            @if ($valoracion->idUsuario == auth()->user()->id)
                                                                                <div class="row float-right mt-2">
                                                                                   <a href="{{url('/eliminarValoracion', [$valoracion->id, $valoracion->idPlato])}}" onclick="return confirm('¿Estas seguro de eliminar esta valoración?')" class="btnAnular"><i class="fas fa-trash"></i></a>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </span>
                                                                    <strong class="text-success">{{$valoracion->name}}</strong>
                                                                    <p>
                                                                        {{$valoracion->comentario}}
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
@endsection