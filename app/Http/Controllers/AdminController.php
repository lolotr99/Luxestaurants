<?php

namespace App\Http\Controllers;

use App\Restaurante;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getControl() {
        return view('admin.control');
    }

    //USUARIOS
    public function getUsers() {
        $usuarios = User::all();
        return view('admin.users.viewUsers', array("usuarios" => $usuarios));
    }

    public function orderUsers(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $data = DB::table('users')
                    ->orderBy('fechanacimiento', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $data = DB::table('users')
                    ->orderBy('fechanacimiento', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $data = DB::table('users')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $data = DB::table('users')
                    ->orderBy('name', 'desc')
                    ->get();
            }
            else {
                $data = DB::table('users')
                    ->orderBy('id', 'asc')
                    ->get();
            }


            foreach($data as $usuario)
            {
                $output .= "            <div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src=".asset($usuario->imagenusuario)." class='img-circle img-thumbnail' alt='imagen de perfil del usuario'>
                        </div><hr><br>
                    </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>Datos de $usuario->email</h1>
                        <hr>
                        <p class='m-0'>Nombre Usuario: $usuario->name</p>
                        <p class='m-0'>Fecha de Nacimiento: ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'>Rol: $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $data = array(
                'datos'  => $output,
            );

            echo json_encode($data);
        }
    }

    public function orderUsersEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $data = DB::table('users')
                    ->orderBy('fechanacimiento', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $data = DB::table('users')
                    ->orderBy('fechanacimiento', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $data = DB::table('users')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $data = DB::table('users')
                    ->orderBy('name', 'desc')
                    ->get();
            }
            else {
                $data = DB::table('users')
                    ->orderBy('id', 'asc')
                    ->get();
            }


            foreach($data as $usuario)
            {
                $output .= "            <div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src=".asset($usuario->imagenusuario)." class='img-circle img-thumbnail' alt='imagen de perfil del usuario'>
                        </div><hr><br>
                    </div>
                    <div class='row mt-2'>
                            <a class='btn btn-secundary' href='".url('/updateUser',$usuario->id)."'>Editar este usuario</a>
                        </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>Datos de $usuario->email</h1>
                        <hr>
                        <p class='m-0'>Nombre Usuario: $usuario->name</p>
                        <p class='m-0'>Fecha de Nacimiento: ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'>Rol: $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $data = array(
                'datos'  => $output,
            );

            echo json_encode($data);
        }
    }

    public function orderUsersEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $data = DB::table('users')
                    ->orderBy('fechanacimiento', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $data = DB::table('users')
                    ->orderBy('fechanacimiento', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $data = DB::table('users')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $data = DB::table('users')
                    ->orderBy('name', 'desc')
                    ->get();
            }
            else {
                $data = DB::table('users')
                    ->orderBy('id', 'asc')
                    ->get();
            }


            foreach($data as $usuario)
            {
                $output .= "            <div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src=".asset($usuario->imagenusuario)." class='img-circle img-thumbnail' alt='imagen de perfil del usuario'>
                        </div><hr><br>
                    </div>
                     <div class='row mt-2'>
                            <a href='".url('/deleteUser', $usuario->id)."' onclick=\"return confirm('¿Estas seguro de eliminar este usuario?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar este usuario</a>
                     </div>
                 
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>Datos de $usuario->email</h1>
                        <hr>
                        <p class='m-0'>Nombre Usuario: $usuario->name</p>
                        <p class='m-0'>Fecha de Nacimiento: ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'>Rol: $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $data = array(
                'datos'  => $output,
            );

            echo json_encode($data);
        }
    }

    public function newUser() {
        return view('admin.users.newUser');
    }

    public function postNewUser(Request $request) {
        $usuario = new User();
        $usuario->email = $request->input('email');
        $usuario->name = $request->input('nombre');
        $usuario->password = bcrypt($request->input('pass'));
        $usuario->fechanacimiento = $request->input('fecha');

        if ($request->hasFile('imagenusuario')) {
            $usuario->imagenusuario = $request->file('imagenusuario')->move('img',$request->file('imagenusuario')->getClientOriginalName());
        } else {
            $usuario->imagenusuario = 'img/defecto.png';
        }
        $usuario->rol = $request->input('rol');
        $usuario->save();
        flash('Nuevo usuario creado correctamente');
        return redirect('/selectUsers');
    }

    public function updateUser() {
        $usuarios = User::all();
        return view('admin.users.updateUsers', array("usuarios" => $usuarios));
    }

    public function viewUpdateUser($id) {
        $usuario = User::find($id);
        return view('admin.users.updateUser',array("usuario" => $usuario));
    }

    public function postUpdateUser(Request $request) {
        $usuario = User::find($request->input('ocultoUser'));

        $usuario->email = $request->input('email');
        $usuario->name = $request->input('nombre');
        $usuario->password = bcrypt($request->input('pass'));
        $usuario->fechanacimiento = $request->input('fecha');

        if ($request->hasFile('imagenusuario')) {
            $usuario->imagenusuario = $request->file('imagenusuario')->move('img',$request->file('imagenusuario')->getClientOriginalName());
        } else {
            $usuario->imagenusuario = $request->input('imagenAntigua');
        }
        $usuario->rol = $request->input('rol');

        $usuario->save();
        flash('Usuario editado correctamente');

        return redirect('/updateUser');
    }

    public function deleteUser() {
        $usuarios = User::all();
        return view('admin.users.deleteUsers', array("usuarios" => $usuarios));
    }

    public function borrarUsuario($id) {
        DB::table('valoraciones')->where("idUsuario", '=', $id)->delete();
        DB::table('reservas')->where("idUsuario", '=', $id)->delete();
        $usuario = User::find($id);
        $usuario->delete();
        flash('Usuario eliminado correctamente');
        return redirect('/deleteUser');
    }

    //RESTAURANTES

    public function getRestaurantes(){
        $restaurantes = Restaurante::all();
        return view('admin.restaurantes.viewRestaurantes',array("restaurantes" => $restaurantes));
    }

    public function buscaSelectLocales(Request $request) {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $data = DB::table('restaurantes')
                ->where('ciudad', 'rlike', $query)
                ->orWhere('zona', 'rlike', $query)
                ->orderBy('id', 'asc')
                ->get();

        }
        else
        {
            $data = DB::table('restaurantes')
                ->orderBy('id', 'asc')
                ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $restaurante)
            {
                $output .= " <div class='row mt-5'>
                    <div class='row'>
                        <h2 class='text-title'> Luxestaurants $restaurante->zona</h2>
                    </div>
                    <div class='row mt-5'>
                        <div class='col-sm-4'>
                            <div class='row'>
                                <div class='card' style='width: 100%; height: 400px'>
                                    <img class='card-img-top' src='".asset('img/logo1.png')."' alt='Card image'>
                                    <div class='card-body'>
                                        <h4 class='card-title'>$restaurante->ciudad - $restaurante->telefono</h4>
                                        <p>Mesas disponibles: $restaurante->numeromesas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-8'>
                            <div class='row ml-3'>
                                <div style='width: 100%'>
                                    <iframe width='785' height='400' src='$restaurante->mapa' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'>
                                        <a href='https://www.mapsdirections.info/marcar-radio-circulo-mapa/'>Calculadora de radio del mapa</a>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        } else {
            $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>No tenemos restaurantes en ese lugar</h4>
                    </div>
            </div>";
        }

        $data = array(
            'datos'  => $output,
        );

        echo json_encode($data);
    }

    public function buscaLocalesDelete(Request $request) {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $data = DB::table('restaurantes')
                ->where('ciudad', 'rlike', $query)
                ->orWhere('zona', 'rlike', $query)
                ->orderBy('id', 'asc')
                ->get();

        }
        else
        {
            $data = DB::table('restaurantes')
                ->orderBy('id', 'asc')
                ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $restaurante)
            {
                $output .= " <div class='row mt-5'>
                    <div class='row'>
                        <h2 class='text-title'> Luxestaurants $restaurante->zona</h2> <span class='ml-5'><a href='".url('/deleteRestaurante', $restaurante->id)."' onclick=\"return confirm('¿Estas seguro de eliminar este restaurante?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar este restaurante</a></span>
                    </div>
                    <div class='row mt-5'>
                        <div class='col-sm-4'>
                            <div class='row'>
                                <div class='card' style='width: 100%; height: 400px'>
                                    <img class='card-img-top' src='".asset('img/logo1.png')."' alt='Card image'>
                                    <div class='card-body'>
                                        <h4 class='card-title'>$restaurante->ciudad - $restaurante->telefono</h4>
                                        <p>Mesas disponibles: $restaurante->numeromesas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-8'>
                            <div class='row ml-3'>
                                <div style='width: 100%'>
                                    <iframe width='785' height='400' src='$restaurante->mapa' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'>
                                        <a href='https://www.mapsdirections.info/marcar-radio-circulo-mapa/'>Calculadora de radio del mapa</a>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        } else {
            $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>No tenemos restaurantes en ese lugar</h4>
                    </div>
            </div>";
        }

        $data = array(
            'datos'  => $output,
        );

        echo json_encode($data);
    }

    public function deleteRestaurante() {
        $restaurantes = Restaurante::all();
        return view('admin.restaurantes.deleteRestaurantes', array("restaurantes" => $restaurantes));
    }

    public function borrarRestaurante($id) {
        DB::table('valoraciones')->where("idRestaurante", '=', $id)->delete();
        DB::table('reservas')->where("idRestaurante", '=', $id)->delete();
        $restaurante = Restaurante::find($id);
        $restaurante->delete();
        flash('Restaurante eliminado correctamente');
        return redirect('/deleteRestaurante');
    }


}
