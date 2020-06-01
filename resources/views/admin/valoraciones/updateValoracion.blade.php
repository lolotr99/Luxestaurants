@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Editar Valoración</h2>
            </div>
            <div class="card-body mt-3">
                @foreach ($valoraciones as $valoracion)
                    <form action="{{url('/postUpdateValoracion')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="ocultoValoracion" id="ocultoValoracion" value="{{$valoracion->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="usuarioRestaurante">Elige usuario y restaurante de la valoración (*)</label>
                                <select id="usuarioRestaurante" name="usuarioRestaurante" required class="form-control">
                                    @foreach ($reservas as $reserva)
                                        @if ($reserva->idUsuario == $valoracion->idUsuario && $reserva->idRestaurante == $valoracion->idRestaurante)
                                            <option value="{{$reserva->idUsuario}}{{$reserva->idRestaurante}}" selected>{{$reserva->name}} ~ {{$reserva->email}} en {{$reserva->zona}} de {{$reserva->ciudad}}</option>
                                        @else
                                            <option value="{{$reserva->idUsuario}}{{$reserva->idRestaurante}}">{{$reserva->name}} ~ {{$reserva->email}} en {{$reserva->zona}} de {{$reserva->ciudad}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="plato">Elige el plato (*)</label>
                                <select id="plato" name="plato" required class="form-control">
                                    @foreach($platos as $plato)
                                        @if($plato->id == $valoracion->idPlato)
                                            <option value="{{$plato->id}}" selected>{{$plato->nombrePlato}}</option>
                                        @else
                                            <option value="{{$plato->id}}">{{$plato->nombrePlato}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="datetime">Fecha de Valoración (*)</label>
                                    <input type="text" id="datetime"  readonly name="datetime" minlength="19" maxlength="19" value="{{$valoracion->fechaValoracion}}" required onfocus="dateTime()" class="demo form-control">
                                </div>
                                <script>
                                    function dateTime() {
                                        var d = new Date();
                                        tail.DateTime("#datetime", {
                                            dateFormat: "dd-mm-YYYY",
                                            timeFormat: "HH:ii:ss",
                                            weekStart: 1, // Monday
                                            position: "top",


                                            timeHours: d.getHours(),
                                            timeMinutes: d.getMinutes(),
                                            timeSeconds: d.getSeconds(),
                                            timeIncrement: true,
                                            timeStepHours: 1,
                                            timeStepMinutes: 30,

                                            locale: "es"
                                        });

                                    }
                                </script>
                            </div>

                            <div class="col-md-6">
                                <label for="valor">Valoración (*)</label>
                                <select class="form-control fa" required id="valor" name="valor">
                                    <option value="1" {{ (1 == $valoracion->valor ? "selected":"") }}>@for($i = 0; $i<1;$i++)&#xf005;@endfor</option>
                                    <option value="2" {{ (2 == $valoracion->valor ? "selected":"") }}>@for($i = 0; $i<2;$i++)&#xf005;@endfor</option>
                                    <option value="3" {{ (3 == $valoracion->valor ? "selected":"") }}>@for($i = 0; $i<3;$i++)&#xf005;@endfor</option>
                                    <option value="4" {{ (4 == $valoracion->valor ? "selected":"") }}>@for($i = 0; $i<4;$i++)&#xf005;@endfor</option>
                                    <option value="5" {{ (5 == $valoracion->valor ? "selected":"") }}>@for($i = 0; $i<5;$i++)&#xf005;@endfor</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                               <label for="comentario">Comentario (*)</label>
                                <textarea class="form-control" id="comentario" required name="comentario">{{$valoracion->comentario}}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar Valoración</button>
                            <a class="btn btn-secundary" href="{{url('/updateValoracion')}}">Cancelar</a>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
