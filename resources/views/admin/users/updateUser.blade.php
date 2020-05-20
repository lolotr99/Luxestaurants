@extends('layouts.master')
@section('content')
    <div class="container text-secondary">
        <div class="card mx-auto my-5">
            <div class="card-header">
                <h2>Editar Usuario</h2>
            </div>
            <div class="card-body mt-3">
                <form action="{{url('/postUpdateUser')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="ocultoUser" value="{{$usuario->id}}">
                    <input type="hidden" name="imagenAntigua" value="{{$usuario->imagenusuario}}">
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" required class="form-control" name="email" id="email" value="{{$usuario->email}}">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="col-form-label">Nombre Usuario</label>
                        <input type="text" required class="form-control" name="nombre" id="nombre" value="{{$usuario->name}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pass">Contraseña</label>
                            <input type="password" required class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha">Fecha Nacimiento</label>
                            <input type="date" name="fecha"  value="{{$usuario->fechanacimiento}}" class="form-control" required id="fecha">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                                <img class="imgLogo" src="{{asset($usuario->imagenusuario)}}">
                            </div>
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="imagenusuario" class="col-form-label">Seleccionar Imagen</label>
                                        <input type="file" name="imagenusuario" accept=".png, .jpg" id="imagenusuario" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rol" class="col-form-label">Rol</label>
                        <select name="rol" class="form-control" required id="rol">
                            <option value="administrador" {{ ("administrador" == $usuario->rol ? "selected":"") }}>Administrador</option>
                            <option value="basico" {{ ("basico" == $usuario->rol ? "selected":"") }}>Básico</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                        <a class="btn btn-secundary" href="{{url('/updateUser')}}">Cancelar</a>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection