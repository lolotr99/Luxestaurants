@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Editar Plato</h2>
            </div>
            <div class="card-body mt-3">
                <form action="{{url('/postUpdatePlato')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="ocultoPlato" value="{{$plato->id}}">
                    <input type="hidden" name="imagenAntigua" value="{{$plato->imagenPlato}}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombrePlato">Nombre del Plato</label>
                            <input type="text" required class="form-control" id="nombrePlato" name="nombrePlato" value="{{$plato->nombrePlato}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precioPlato">Precio</label>
                            <input type="number"  step=".50" name="precioPlato" min="0"  value="{{$plato->precioPlato}}" class="form-control" required id="precioPlato" placeholder="0,00€">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion">{{$plato->descripcion}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="row mt-5">
                                    <div class="text-center">
                                        <img src="{{asset($plato->imagenPlato)}}" class="img-circle img-thumbnail">
                                    </div><br>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="tab-content">
                                    <div class="form-group mt-5">
                                        <label for="imagenPlato" class="col-form-label">Seleccionar Imagen</label>
                                        <input type="file" class="form-control" name="imagenPlato" accept=".png, .jpg" id="imagenPlato">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Plato</button>
                        <a class="btn btn-secundary" href="{{url('/updatePlato')}}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
