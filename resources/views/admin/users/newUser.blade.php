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
                <h2>Nuevo Usuario</h2>
            </div>
            <div class="card-body mt-3">
                <form action="{{url('/postNewUser')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" required class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="col-form-label">Nombre Usuario</label>
                        <input type="text" required class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pass">Contraseña</label>
                            <input type="password" required class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha">Fecha Nacimiento</label>
                            <input type="date" name="fecha"  class="form-control" required id="fecha">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imagenusuario" class="col-form-label">Seleccionar Imagen</label>
                        <input type="file" name="imagenusuario" accept=".png, .jpg" id="imagenusuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rol" class="col-form-label">Rol</label>
                        <select name="rol" class="form-control" required id="rol">
                            <option value="administrador">Administrador</option>
                            <option value="basico" selected>Básico</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                        <a class="btn btn-secundary" href="{{url('/control')}}">Cancelar</a>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection