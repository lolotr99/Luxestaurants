@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Editar Reserva</h2>
            </div>
            <div class="card-body mt-3">
                    <form action="{{url('/postNewReserva')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="usuario">Elige el usuario</label>
                                <select id="usuario" name="usuario" required class="form-control">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{{$usuario->name}} ~ {{$usuario->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="restaurante">Elige el restaurante</label>
                                <select id="restaurante" name="restaurante" required class="form-control">
                                    @foreach ($restaurantes as $restaurante)
                                        <option value="{{$restaurante->id}}">{{$restaurante->ciudad}} ~ {{$restaurante->zona}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="titular">Titular de la reserva</label>
                                    <input type="text" id="titular" name="titular"  class="form-control" required  placeholder="Nombre y Apellidos">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="numeroPersonas">Nº de personas (*)</label>
                                    <input id="numeroPersonas" type="number" min="1" max="8" required name="numeroPersonas" class="form-control" placeholder="Numero de Personas">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="datetime">Fecha (*)</label>
                                    <input type="text" id="datetime"  name="datetime" minlength="19" maxlength="19" required onfocus="dateTime()" class="demo form-control">
                                </div>
                                <script>
                                    function dateTime() {
                                        tail.DateTime("#datetime", {
                                            dateFormat: "dd-mm-YYYY",
                                            timeFormat: "HH:ii",
                                            weekStart: 1, // Monday
                                            position: "top",
                                            dateStart: Date.now(),
                                            dateRanges: [
                                                {
                                                    days: ["MON"]
                                                }
                                            ],


                                            timeHours: 0,
                                            timeMinutes: 0,
                                            timeSeconds: null,
                                            timeIncrement: true,
                                            timeStepHours: 1,
                                            timeStepMinutes: 30,

                                            locale: "es"
                                        });

                                    }
                                </script>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear Reserva</button>
                            <a class="btn btn-secundary" href="{{url('/control')}}">Cancelar</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
