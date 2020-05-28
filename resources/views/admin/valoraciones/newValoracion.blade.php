@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Nueva Valoración</h2>
            </div>
            <div class="card-body mt-3">
                    <form action="{{url('/postNewValoracion')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="usuarioRestaurante">Elige usuario y restaurante de la valoración</label>
                                <select id="usuarioRestaurante" required name="usuarioRestaurante" class="form-control">
                                    @foreach ($reservas as $reserva)
                                        <option value="{{$reserva->idUsuario}}{{$reserva->idRestaurante}}">{{$reserva->name}} ~ {{$reserva->email}} en {{$reserva->zona}} de {{$reserva->ciudad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="plato">Elige el plato</label>
                                <select id="plato" name="plato" required class="form-control">
                                    @foreach($platos as $plato)
                                        <option value="{{$plato->id}}">{{$plato->nombrePlato}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="datetime">Fecha de Valoración</label>
                                    <input type="text" id="datetime"  name="datetime" minlength="19" maxlength="19" required onfocus="dateTime()" class="demo form-control">
                                </div>
                                <script>
                                    function dateTime() {
                                        tail.DateTime("#datetime", {
                                            dateFormat: "dd-mm-YYYY",
                                            timeFormat: "HH:ii:ss",
                                            weekStart: 1, // Monday
                                            position: "top",


                                            timeHours: 0,
                                            timeMinutes: 0,
                                            timeSeconds: 0,
                                            timeIncrement: true,
                                            timeStepHours: 1,
                                            timeStepMinutes: 30,

                                            locale: "es"
                                        });

                                    }
                                </script>
                            </div>

                            <div class="col-md-6">
                                <label for="valor">Valoración</label>
                                <select class="form-control fa" id="valor" required name="valor">
                                    <option value="1" >@for($i = 0; $i<1;$i++)&#xf005;@endfor</option>
                                    <option value="2" >@for($i = 0; $i<2;$i++)&#xf005;@endfor</option>
                                    <option value="3" >@for($i = 0; $i<3;$i++)&#xf005;@endfor</option>
                                    <option value="4" >@for($i = 0; $i<4;$i++)&#xf005;@endfor</option>
                                    <option value="5" selected>@for($i = 0; $i<5;$i++)&#xf005;@endfor</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                               <label for="comentario">Comentario</label>
                                <textarea class="form-control" id="comentario" required name="comentario"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear Valoración</button>
                            <a class="btn btn-secundary" href="{{url('/control')}}">Cancelar</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
