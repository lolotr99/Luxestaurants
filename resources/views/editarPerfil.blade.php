@extends('layouts.master')
@section('content')
    <div class="container text-secondary ">
        <div class="row mt-2">
            <div class="col-sm-3"></div>
            <div class="col-sm-9"><h4 class="text-title">{{$user->email}}</h4></div>
        </div>
        <form class="form" action="{{url('/postEditPerfil')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <img src="{{asset($user->imagenusuario)}}" class="img-circle img-thumbnail" alt="imagen del usuario a modificar">
                        <div class="custom-file">
                            <input type="file" id="imagenUsuario" class="custom-file-input" name="imagenUsuario" lang="es">
                            <label class="custom-file-label text-left" for="imagenUsuario">Elegir imagen</label>
                        </div>
                    </div></hr><br>
                </div>
                <div class="col-sm-9 text-left">
                    <div class="tab-content">
                        <hr>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="nombreUsuario" class="h4">Nombre de usuario</label>
                                <input type="text" class="form-control" required id="nombreUsuario" name="nombreUsuario" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="contrasenia" class="h4">Contraseña</label>
                                <input type="password" required class="form-control" id="contrasenia" name="contrasenia">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="fechaNacimiento" class="h4">Fecha de nacimiento</label>
                                <input type="date" class="form-control" required id="fechaNacimiento" name="fechaNacimiento" value="{{ $user->fechanacimiento }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <input type="hidden" id="ocultoImagenAntigua" name="ocultoImagenAntigua" value="{{$user->imagenusuario}}">
                                <input class="btn btn-secundary" type="submit" value="Guardar">
                                <a class="btn btn-secundary" href="{{url('/miPerfil')}}">Cancelar</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection