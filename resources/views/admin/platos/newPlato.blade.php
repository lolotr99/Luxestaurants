@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="row ml-5 mt-5">
            <div class="col-sm-12">
                <a class="estiloEnlaces" href="{{url('/control')}}"><img src="{{asset('img/volver.png')}}"/><span class="ml-3">Volver a página de control</span></a>
            </div>
        </div>
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Nuevo Plato</h2>
            </div>
            <div class="card-body mt-3">
                <form action="{{url('/postNewPlato')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombrePlato">Nombre del Plato</label>
                            <input type="text" required class="form-control" id="nombrePlato" name="nombrePlato">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precioPlato">Precio</label>
                            <input type="number"  step=".50" name="precioPlato" min="0" class="form-control" required id="precioPlato" placeholder="0,00€">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagenPlato" class="col-form-label">Seleccionar Imagen</label>
                        <input type="file" name="imagenPlato" accept=".png, .jpg" id="imagenPlato"  required class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear Plato</button>
                        <a class="btn btn-secundary" href="{{url('/control')}}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
