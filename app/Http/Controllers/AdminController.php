<?php

namespace App\Http\Controllers;

use App\Plato;
use App\Reserva;
use App\Restaurante;
use App\User;
use App\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getControl() {
        return view('admin.control');
    }

    //USUARIOS
    public function getUsers() {
        $usuarios = DB::table('users')->paginate(5);
        return view('admin.users.viewUsers', compact('usuarios'));
    }

    public function orderUsers(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $usuarios = DB::table('users')
                    ->orderBy('fechanacimiento', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $usuarios = DB::table('users')
                    ->orderBy('fechanacimiento', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $usuarios = DB::table('users')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $usuarios = DB::table('users')
                    ->orderBy('name', 'desc')
                    ->get();
            }
            else {}


            foreach($usuarios as $usuario)
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
                        <p class='m-0'><b>Nombre Usuario:</b> $usuario->name</p>
                        <p class='m-0'><b>Fecha de Nacimiento:</b> ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'><b>Rol:</b> $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $usuarios = array(
                'datos'  => $output,
            );

            echo json_encode($usuarios);

        }
    }

    public function buscarUsers(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $usuarios = DB::table('users')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $usuarios->count();
            if($total_row > 0)
            {
                foreach($usuarios as $usuario)
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
                        <p class='m-0'><b>Nombre Usuario:</b> $usuario->name</p>
                        <p class='m-0'><b>Fecha de Nacimiento:</b> ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'><b>Rol:</b> $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $usuarios = array(
                'datos'  => $output,
            );

            echo json_encode($usuarios);
        }
    }

    public function orderUsersEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $usuarios = DB::table('users')
                    ->orderBy('fechanacimiento', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $usuarios = DB::table('users')
                    ->orderBy('fechanacimiento', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $usuarios = DB::table('users')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $usuarios = DB::table('users')
                    ->orderBy('name', 'desc')
                    ->get();
            }
            else {}


            foreach($usuarios as $usuario)
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
                        <p class='m-0'><b>Nombre Usuario:</b> $usuario->name</p>
                        <p class='m-0'><b>Fecha de Nacimiento:</b> ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'><b>Rol:</b> $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $usuarios = array(
                'datos'  => $output,
            );

            echo json_encode($usuarios);
        }
    }

    public function buscarUsersEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $usuarios = DB::table('users')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $usuarios->count();
            if($total_row > 0)
            {
                foreach($usuarios as $usuario)
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
                        <p class='m-0'><b>Nombre Usuario:</b> $usuario->name</p>
                        <p class='m-0'><b>Fecha de Nacimiento:</b> ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'><b>Rol:</b> $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $usuarios = array(
                'datos'  => $output,
            );

            echo json_encode($usuarios);
        }
    }

    public function orderUsersEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $usuarios = DB::table('users')
                    ->orderBy('fechanacimiento', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $usuarios = DB::table('users')
                    ->orderBy('fechanacimiento', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $usuarios = DB::table('users')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $usuarios = DB::table('users')
                    ->orderBy('name', 'desc')
                    ->get();
            }
            else {}


            foreach($usuarios as $usuario)
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
                        <p class='m-0'><b>Nombre Usuario:</b> $usuario->name</p>
                        <p class='m-0'><b>Fecha de Nacimiento:</b> ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'><b>Rol:</b> $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $usuarios = array(
                'datos'  => $output,
            );

            echo json_encode($usuarios);
        }
    }

    public function buscarUsersEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $usuarios = DB::table('users')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $usuarios->count();
            if($total_row > 0)
            {
                foreach($usuarios as $usuario)
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
                        <p class='m-0'><b>Nombre Usuario:</b> $usuario->name</p>
                        <p class='m-0'><b>Fecha de Nacimiento:</b> ".date('d/m/Y', strtotime($usuario->fechanacimiento))."</p>
                        <p class='m-0'><b>Rol:</b> $usuario->rol</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $usuarios = array(
                'datos'  => $output,
            );

            echo json_encode($usuarios);
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
        $usuarios = DB::table('users')->paginate(5);
        return view('admin.users.updateUsers', compact('usuarios'));
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
        $usuarios = DB::table('users')->paginate(5);
        return view('admin.users.deleteUsers', compact("usuarios"));
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
        $restaurantes = DB::table('restaurantes')->paginate(5);
        return view('admin.restaurantes.viewRestaurantes',compact("restaurantes"));
    }

    public function buscaSelectLocales(Request $request) {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $restaurantes = DB::table('restaurantes')
                ->where('ciudad', 'rlike', $query)
                ->orWhere('zona', 'rlike', $query)
                ->orderBy('id', 'asc')
                ->get();

        }
        else {}
        $total_row = $restaurantes->count();
        if($total_row > 0)
        {
            foreach($restaurantes as $restaurante)
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

        $restaurantes = array(
            'datos'  => $output,
        );

        echo json_encode($restaurantes);
    }

    public function buscaLocalesUpdate(Request $request) {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $restaurantes = DB::table('restaurantes')
                ->where('ciudad', 'rlike', $query)
                ->orWhere('zona', 'rlike', $query)
                ->orderBy('id', 'asc')
                ->get();

        }
        else {}
        $total_row = $restaurantes->count();
        if($total_row > 0)
        {
            foreach($restaurantes as $restaurante)
            {
                $output .= " <div class='row mt-5'>
                    <div class='row'>
                        <h2 class='text-title'> Luxestaurants $restaurante->zona</h2> <span class='ml-5'><a href='".url('/updateRestaurante', $restaurante->id)."' class='btnAnular estiloEnlaces'><i class='fas fa-edit fa-2x'></i> Editar este restaurante</a></span>
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

        $restaurantes = array(
            'datos'  => $output,
        );

        echo json_encode($restaurantes);
    }

    public function buscaLocalesDelete(Request $request) {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $restaurantes = DB::table('restaurantes')
                ->where('ciudad', 'rlike', $query)
                ->orWhere('zona', 'rlike', $query)
                ->orderBy('id', 'asc')
                ->get();

        }
        else{}
        $total_row = $restaurantes->count();
        if($total_row > 0)
        {
            foreach($restaurantes as $restaurante)
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

        $restaurantes = array(
            'datos'  => $output,
        );

        echo json_encode($restaurantes);
    }

    public function newRestaurante() {
        return view('admin.restaurantes.newRestaurante');
    }

    public function postNewRestaurante(Request $request) {
        $restaurante = new Restaurante();
        $restaurante->ciudad = $request->input('ciudad');
        $restaurante->zona = $request->input('zona');
        $restaurante->numeromesas = $request->input('numeromesas');
        $restaurante->telefono = $request->input('telefono');
        $restaurante->mapa = $request->input('direccionMapa');
        $restaurante->save();

        flash('Restaurante creado correctamente');
        return redirect('/selectRestaurantes');
    }

    public function updateRestaurante() {
        $restaurantes = DB::table('restaurantes')->paginate(5);
        return view('admin.restaurantes.updateRestaurantes',compact("restaurantes"));
    }

    public function postUpdateRestaurante(Request $request) {
        $restaurante = Restaurante::find($request->input('ocultoId'));
        $restaurante->ciudad = $request->input('ciudad');
        $restaurante->zona = $request->input('zona');
        $restaurante->numeromesas = $request->input('numeromesas');
        $restaurante->telefono = $request->input('telefono');
        $restaurante->mapa = $request->input('direccion');
        $restaurante->save();

        flash('Restaurante editado correctamente');
        return redirect('/updateRestaurante');
    }

    public function viewUpdateRestaurante($id) {
        $restaurante = Restaurante::find($id);
        return view('admin.restaurantes.updateRestaurante',array("restaurante" =>$restaurante));
    }

    public function deleteRestaurante() {
        $restaurantes = DB::table('restaurantes')->paginate(5);
        return view('admin.restaurantes.deleteRestaurantes', compact("restaurantes"));
    }

    public function borrarRestaurante($id) {
        DB::table('valoraciones')->where("idRestaurante", '=', $id)->delete();
        DB::table('reservas')->where("idRestaurante", '=', $id)->delete();
        $restaurante = Restaurante::find($id);
        $restaurante->delete();
        flash('Restaurante eliminado correctamente');
        return redirect('/deleteRestaurante');
    }

    //PLATOS

    public function getPlatos() {
        $platos = DB::table('platos')->paginate(5);
        return view('admin.platos.viewPlatos',compact('platos'));
    }

    public function orderPlatos(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "precioAsc") {
                $platos = DB::table('platos')
                    ->orderBy('precioPlato', 'asc')
                    ->get();
            }
            else if ($query == "precioDesc") {
                $platos = DB::table('platos')
                    ->orderBy('precioPlato', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $platos = DB::table('platos')
                    ->orderBy('nombrePlato', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $platos = DB::table('platos')
                    ->orderBy('nombrePlato', 'desc')
                    ->get();
            }
            else {}


            foreach($platos as $plato)
            {
                $output .= "<div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src='".asset($plato->imagenPlato)."' class='img-circle img-thumbnail'>
                        </div><hr><br>
                    </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>$plato->nombrePlato</h1>
                        <hr>
                        <p class='m-0'><b>Descripción: </b> $plato->descripcion</p>
                        <p class='m-0'><b>Precio: </b> $plato->precioPlato €</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $platos = array(
                'datos'  => $output,
            );

            echo json_encode($platos);
        }
    }

    public function buscarPlatos(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $platos = DB::table('platos')
                    ->where('nombrePlato', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $platos->count();
            if($total_row > 0)
            {
                foreach($platos as $plato)
                {
                    $output .= "<div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src='".asset($plato->imagenPlato)."' class='img-circle img-thumbnail'>
                        </div><hr><br>
                    </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>$plato->nombrePlato</h1>
                        <hr>
                        <p class='m-0'><b>Descripción: </b> $plato->descripcion</p>
                        <p class='m-0'><b>Precio: </b> $plato->precioPlato €</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún plato coincide con ese nombre</h4>
                    </div>
            </div>";
            }

            $platos = array(
                'datos'  => $output,
            );

            echo json_encode($platos);
        }
    }

    public function orderPlatosEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "precioAsc") {
                $platos = DB::table('platos')
                    ->orderBy('precioPlato', 'asc')
                    ->get();
            }
            else if ($query == "precioDesc") {
                $platos = DB::table('platos')
                    ->orderBy('precioPlato', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $platos = DB::table('platos')
                    ->orderBy('nombrePlato', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $platos = DB::table('platos')
                    ->orderBy('nombrePlato', 'desc')
                    ->get();
            }
            else {}


            foreach($platos as $plato)
            {
                $output .= "<div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src='".asset($plato->imagenPlato)."' class='img-circle img-thumbnail'>
                        </div><hr><br>
                    </div>
                    <div class='row mt-2'>
                            <a class='btn btn-secundary' href='".url('/updatePlato',$plato->id)."'>Editar este plato</a>
                    </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>$plato->nombrePlato</h1>
                        <hr>
                        <p class='m-0'><b>Descripción: </b> $plato->descripcion</p>
                        <p class='m-0'><b>Precio: </b> $plato->precioPlato €</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $platos = array(
                'datos'  => $output,
            );

            echo json_encode($platos);
        }
    }

    public function buscarPlatosEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $platos = DB::table('platos')
                    ->where('nombrePlato', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $platos->count();
            if($total_row > 0)
            {
                foreach($platos as $plato)
                {
                    $output .= "<div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src='".asset($plato->imagenPlato)."' class='img-circle img-thumbnail'>
                        </div><hr><br>
                    </div>
                    <div class='row mt-2'>
                            <a class='btn btn-secundary' href='".url('/updatePlato',$plato->id)."'>Editar este plato</a>
                    </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>$plato->nombrePlato</h1>
                        <hr>
                        <p class='m-0'><b>Descripción: </b> $plato->descripcion</p>
                        <p class='m-0'><b>Precio: </b> $plato->precioPlato €</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún plato coincide con ese nombre</h4>
                    </div>
            </div>";
            }

            $platos = array(
                'datos'  => $output,
            );

            echo json_encode($platos);
        }
    }

    public function orderPlatosEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "precioAsc") {
                $platos = DB::table('platos')
                    ->orderBy('precioPlato', 'asc')
                    ->get();
            }
            else if ($query == "precioDesc") {
                $platos = DB::table('platos')
                    ->orderBy('precioPlato', 'desc')
                    ->get();
            }
            else if ($query == "nombreAsc") {
                $platos = DB::table('platos')
                    ->orderBy('nombrePlato', 'asc')
                    ->get();
            }
            else if ($query == "nombreDesc") {
                $platos = DB::table('platos')
                    ->orderBy('nombrePlato', 'desc')
                    ->get();
            }
            else {}


            foreach($platos as $plato)
            {
                $output .= "<div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src='".asset($plato->imagenPlato)."' class='img-circle img-thumbnail'>
                        </div><hr><br>
                    </div>
                    <div class='row mt-2'>
                            <a href='".url('/deletePlato', $plato->id)."' onclick=\"return confirm('¿Estas seguro de eliminar este plato?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar este plato</a>
                    </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>$plato->nombrePlato</h1>
                        <hr>
                        <p class='m-0'><b>Descripción: </b> $plato->descripcion</p>
                        <p class='m-0'><b>Precio: </b> $plato->precioPlato €</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
            }

            $platos = array(
                'datos'  => $output,
            );

            echo json_encode($platos);
        }
    }

    public function buscarPlatosEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $platos = DB::table('platos')
                    ->where('nombrePlato', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $platos->count();
            if($total_row > 0)
            {
                foreach($platos as $plato)
                {
                    $output .= "<div class='row mt-5'>
                <div class='col-sm-3'>
                    <div class='row'>
                        <div class='text-center'>
                            <img src='".asset($plato->imagenPlato)."' class='img-circle img-thumbnail'>
                        </div><hr><br>
                    </div>
                    <div class='row mt-2'>
                            <a href='".url('/deletePlato', $plato->id)."' onclick=\"return confirm('¿Estas seguro de eliminar este plato?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar este plato</a>
                    </div>
                </div>
                <div class='col-sm-9 text-left'>
                    <div class='tab-content'>
                        <h1 class='text-title'>$plato->nombrePlato</h1>
                        <hr>
                        <p class='m-0'><b>Descripción: </b> $plato->descripcion</p>
                        <p class='m-0'><b>Precio: </b> $plato->precioPlato €</p>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún plato coincide con ese nombre</h4>
                    </div>
            </div>";
            }

            $platos = array(
                'datos'  => $output,
            );

            echo json_encode($platos);
        }
    }

    public function newPlato() {
        return view("admin.platos.newPlato");
    }

    public function postNewPlato(Request $request) {
        $plato = new Plato();
        $plato->nombrePlato = $request->input('nombrePlato');
        $plato->precioPlato = $request->input('precioPlato');
        $plato->descripcion = $request->input('descripcion');
        $plato->imagenPlato = $request->file('imagenPlato')->move('img',$request->file('imagenPlato')->getClientOriginalName());
        $plato->save();
        flash('Nuevo plato creado correctamente');
        return redirect('/selectPlatos');
    }

    public function updatePlato() {
        $platos = DB::table('platos')->paginate(5);
        return view('admin.platos.updatePlatos', compact("platos"));
    }

    public function viewUpdatePlato($id) {
        $plato = Plato::find($id);
        return view('admin.platos.updatePlato',array("plato" =>$plato));
    }

    public function postUpdatePlato(Request $request) {
        $plato = Plato::find($request->input('ocultoPlato'));

        $plato->nombrePlato = $request->input('nombrePlato');
        $plato->descripcion = $request->input('descripcion');
        $plato->precioPlato = $request->input('precioPlato');

        if ($request->hasFile('imagenPlato')) {
            $plato->imagenPlato = $request->file('imagenPlato')->move('img',$request->file('imagenPlato')->getClientOriginalName());
        } else {
            $plato->imagenPlato = $request->input('imagenAntigua');
        }

        $plato->save();
        flash('Plato editado correctamente');

        return redirect('/updatePlato');
    }

    public function deletePlato() {
        $platos = DB::table('platos')->paginate(5);
        return view("admin.platos.deletePlatos",compact("platos"));
    }

    public function borrarPlato($id) {
        DB::table('valoraciones')->where("idPlato", '=', $id)->delete();
        $plato = Plato::find($id);
        $plato->delete();
        flash('Plato eliminado correctamente');
        return redirect('/deletePlato');
    }

    //RESERVAS
    public function getReservas() {
        $reservas = DB::table('reservas')
            ->join('restaurantes','idRestaurante', '=', 'restaurantes.id')
            ->join('users','idUsuario','=','users.id')
            ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
            ->paginate('1');

        return view('admin.reservas.viewReservas',compact("reservas"));
    }

    public function orderReservas(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->orderBy('fechaReserva', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->orderBy('fechaReserva', 'desc')
                    ->get();
            }
            else {}


            foreach($reservas as $reserva)
            {
                $output .= " <div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($reserva->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div><hr><br>
                        </div>
                    </div>
                    <div class='col-sm-9 text-left'>
                        <div class='tab-content'>
                            <h1 class='text-title'>$reserva->name ~ $reserva->email</h1>
                            <hr>
                            <p class='m-0'><b>Restaurante: </b>  $reserva->ciudad ~ $reserva->zona</p>
                            <p class='m-0'><b>Titular de la Reserva: </b>$reserva->nombrePersona</p>
                            <p class='m-0'><b>Mesa para: </b>$reserva->personas personas</p>
                            <p class='m-0'><b>Fecha y hora: </b>".$reserva->fechaReserva->toFormattedDateString()." a las ".date('H:i', strtotime($reserva->fechaReserva))."</p>
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>";
            }

            $reservas = array(
                'datos'  => $output,
            );

            echo json_encode($reservas);
        }
    }

    public function buscaReservas(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->orderBy('fechaReserva', 'asc')
                    ->get();
            }
            else {}


            $total_row = $reservas->count();
            if($total_row > 0)
            {
                foreach($reservas as $reserva)
                {
                    $output .= " <div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($reserva->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div><hr><br>
                        </div>
                    </div>
                    <div class='col-sm-9 text-left'>
                        <div class='tab-content'>
                            <h1 class='text-title'>$reserva->name ~ $reserva->email</h1>
                            <hr>
                            <p class='m-0'><b>Restaurante: </b>  $reserva->ciudad ~ $reserva->zona</p>
                            <p class='m-0'><b>Titular de la Reserva: </b>$reserva->nombrePersona</p>
                            <p class='m-0'><b>Mesa para: </b>$reserva->personas personas</p>
                            <p class='m-0'><b>Fecha y hora: </b>".$reserva->fechaReserva->toFormattedDateString()." a las ".date('H:i', strtotime($reserva->fechaReserva))."</p>
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $reservas = array(
                'datos'  => $output,
            );

            echo json_encode($reservas);
        }
    }

    public function orderReservasEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->orderBy('fechaReserva', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->orderBy('fechaReserva', 'desc')
                    ->get();
            }
            else {}


            foreach($reservas as $reserva)
            {
                $output .= " <div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($reserva->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div><hr><br>
                        </div>
                        <div class='row mt-2'>
                            <a class='btn btn-secundary' href='".url('/updateReserva',$reserva->id)."'>Editar esta reserva</a>
                        </div>
                    </div>
                    <div class='col-sm-9 text-left'>
                        <div class='tab-content'>
                            <h1 class='text-title'>$reserva->name ~ $reserva->email</h1>
                            <hr>
                            <p class='m-0'><b>Restaurante: </b>  $reserva->ciudad ~ $reserva->zona</p>
                            <p class='m-0'><b>Titular de la Reserva: </b>$reserva->nombrePersona</p>
                            <p class='m-0'><b>Mesa para: </b>$reserva->personas personas</p>
                            <p class='m-0'><b>Fecha y hora: </b>".$reserva->fechaReserva->toFormattedDateString()." a las ".date('H:i', strtotime($reserva->fechaReserva))."</p>
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>";
            }

            $reservas = array(
                'datos'  => $output,
            );

            echo json_encode($reservas);
        }
    }

    public function buscaReservasEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->orderBy('fechaReserva', 'asc')
                    ->get();
            }
            else {}


            $total_row = $reservas->count();
            if($total_row > 0)
            {
                foreach($reservas as $reserva)
                {
                    $output .= " <div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($reserva->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div><hr><br>
                        </div>
                        <div class='row mt-2'>
                            <a class='btn btn-secundary' href='".url('/updateReserva',$reserva->id)."'>Editar esta reserva</a>
                        </div>
                    </div>
                    <div class='col-sm-9 text-left'>
                        <div class='tab-content'>
                            <h1 class='text-title'>$reserva->name ~ $reserva->email</h1>
                            <hr>
                            <p class='m-0'><b>Restaurante: </b>  $reserva->ciudad ~ $reserva->zona</p>
                            <p class='m-0'><b>Titular de la Reserva: </b>$reserva->nombrePersona</p>
                            <p class='m-0'><b>Mesa para: </b>$reserva->personas personas</p>
                            <p class='m-0'><b>Fecha y hora: </b>".$reserva->fechaReserva->toFormattedDateString()." a las ".date('H:i', strtotime($reserva->fechaReserva))."</p>
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $reservas = array(
                'datos'  => $output,
            );

            echo json_encode($reservas);
        }
    }

    public function orderReservasEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->orderBy('fechaReserva', 'asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->orderBy('fechaReserva', 'desc')
                    ->get();
            }
            else {}


            foreach($reservas as $reserva)
            {
                $output .= " <div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($reserva->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div><hr><br>
                        </div>
                        <div class='row mt-2'>
                            <a href='".url('/deleteReserva', $reserva->id)."' onclick=\"return confirm('¿Estas seguro de eliminar esta reserva?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar esta reserva</a>
                        </div>
                    </div>
                    <div class='col-sm-9 text-left'>
                        <div class='tab-content'>
                            <h1 class='text-title'>$reserva->name ~ $reserva->email</h1>
                            <hr>
                            <p class='m-0'><b>Restaurante: </b>  $reserva->ciudad ~ $reserva->zona</p>
                            <p class='m-0'><b>Titular de la Reserva: </b>$reserva->nombrePersona</p>
                            <p class='m-0'><b>Mesa para: </b>$reserva->personas personas</p>
                            <p class='m-0'><b>Fecha y hora: </b>".$reserva->fechaReserva->toFormattedDateString()." a las ".date('H:i', strtotime($reserva->fechaReserva))."</p>
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>";
            }

            $reservas = array(
                'datos'  => $output,
            );

            echo json_encode($reservas);
        }
    }

    public function buscaReservasEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $reservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
                    ->join('users','idUsuario','=','users.id')
                    ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->orderBy('fechaReserva', 'asc')
                    ->get();
            }
            else {}


            $total_row = $reservas->count();
            if($total_row > 0)
            {
                foreach($reservas as $reserva)
                {
                    $output .= " <div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($reserva->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div><hr><br>
                        </div>
                        <div class='row mt-2'>
                            <a href='".url('/deleteReserva', $reserva->id)."' onclick=\"return confirm('¿Estas seguro de eliminar esta reserva?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar esta reserva</a>
                        </div>
                    </div>
                    <div class='col-sm-9 text-left'>
                        <div class='tab-content'>
                            <h1 class='text-title'>$reserva->name ~ $reserva->email</h1>
                            <hr>
                            <p class='m-0'><b>Restaurante: </b>  $reserva->ciudad ~ $reserva->zona</p>
                            <p class='m-0'><b>Titular de la Reserva: </b>$reserva->nombrePersona</p>
                            <p class='m-0'><b>Mesa para: </b>$reserva->personas personas</p>
                            <p class='m-0'><b>Fecha y hora: </b>".$reserva->fechaReserva->toFormattedDateString()." a las ".date('H:i', strtotime($reserva->fechaReserva))."</p>
                            <hr>
                        </div>
                    </div>
                    <hr>
                </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $reservas = array(
                'datos'  => $output,
            );

            echo json_encode($reservas);
        }
    }

    public function newReserva() {
        $usuarios = User::all();
        $restaurantes = Restaurante::all();
        return view('admin.reservas.newReserva',array('usuarios' => $usuarios, 'restaurantes' => $restaurantes));
    }

    public function postNewReserva(Request $request) {
        $reserva = new Reserva();
        $reserva->idUsuario = $request->input('usuario');
        $reserva->idRestaurante = $request->input('restaurante');
        $reserva->nombrePersona = $request->input('titular');
        $reserva->personas = $request->input('numeroPersonas');
        $reserva->fechaReserva = $request->input('datetime');
        $reserva->save();
        flash('Nueva reserva creada correctamente');
        return redirect('/selectReservas');
    }

    public function updateReserva() {
        $reservas = DB::table('reservas')
            ->join('restaurantes','idRestaurante', '=', 'restaurantes.id')
            ->join('users','idUsuario','=','users.id')
            ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
            ->paginate(5);

        return view('admin.reservas.updateReservas',compact("reservas"));
    }

    public function viewUpdateReserva($id) {
        $reserva = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')
            ->join('users','idUsuario','=','users.id')
            ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id','restaurantes.id as idRestaurante','users.id as idUsuario')
            ->where('reservas.id', '=', $id)
            ->get();

        $usuarios = User::all();
        $restaurantes = Restaurante::all();

        return view('admin.reservas.updateReserva', array("reservas" => $reserva, "usuarios" => $usuarios, "restaurantes" => $restaurantes));
    }

    public function postUpdateReserva(Request $request) {
        $reserva = Reserva::find($request->input('ocultoReserva'));
        $reserva->idUsuario = $request->input('usuario');
        $reserva->idRestaurante = $request->input('restaurante');
        $reserva->nombrePersona = $request->input('titular');
        $reserva->personas = $request->input('numeroPersonas');
        $reserva->fechaReserva = $request->input('datetime');
        $reserva->save();
        flash('Reserva actualizada correctamente');
        return redirect('/updateReserva');
    }

    public function deleteReserva() {
        $reservas = DB::table('reservas')
            ->join('restaurantes','idRestaurante', '=', 'restaurantes.id')
            ->join('users','idUsuario','=','users.id')
            ->select('users.email','users.name','users.imagenusuario','restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')
            ->paginate(5);

        return view('admin.reservas.deleteReservas',compact("reservas" ));
    }

    public function borrarReserva($id) {
        $reserva = Reserva::find($id);
        $reserva->delete();
        flash('Reserva eliminada correctamente');
        return redirect('/deleteReserva');
    }

    //VALORACIONES
    public function getValoraciones() {
        $valoraciones = DB::table('valoraciones')->join('platos','idPlato','platos.id')
            ->join('users','idUsuario','users.id')
            ->join('restaurantes','idRestaurante','restaurantes.id')
            ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
            ->paginate(5);
        return view("admin.valoraciones.viewValoraciones",compact('valoraciones'));
    }

    public function orderValoraciones(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
                    ->orderBy('fechaValoracion','asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
                    ->orderBy('fechaValoracion','desc')
                    ->get();
            }
            else if ($query == "valorAsc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
                    ->orderBy('valor','asc')
                    ->get();
            }
            else if ($query == "valorDesc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
                    ->orderBy('valor','desc')
                    ->get();
            }
            else {}


            foreach($valoraciones as $valoracion)
            {
                $output .= "<div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 text-left'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='tab-content'>
                                    <h1 class='text-title'>$valoracion->ciudad ~ $valoracion->zona</h1>
                                    <hr>
                                    <p class='m-0'><b>Nombre del usuario que valora:</b> $valoracion->name</p>
                                    <p class='m-0'><b>Email del usuario que valora:</b> $valoracion->email</p>
                                    <p class='m-0'><b>Fecha de Valoración:</b> ".date('d/m/Y H:i', strtotime($valoracion->fechaValoracion))."</p>
                                    <p class='m-0'><b>Comentario:</b> $valoracion->comentario</p>
                                    <p class='m-0'><b>Valoración: </b>
                                        <span>";
                                            for ($i = 0; $i <$valoracion->valor; $i++)
                                                $output.= "<i class='text-warning fa fa-star'></i>";
                                        $output.= "</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenPlato)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                </div>";
            }

            $valoraciones = array(
                'datos'  => $output,
            );

            echo json_encode($valoraciones);
        }
    }

    public function buscaValoraciones(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $valoraciones->count();
            if($total_row > 0)
            {
                foreach($valoraciones as $valoracion)
                {
                    $output .= "<div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 text-left'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='tab-content'>
                                    <h1 class='text-title'>$valoracion->ciudad ~ $valoracion->zona</h1>
                                    <hr>
                                    <p class='m-0'><b>Nombre del usuario que valora:</b> $valoracion->name</p>
                                    <p class='m-0'><b>Email del usuario que valora:</b> $valoracion->email</p>
                                    <p class='m-0'><b>Fecha de Valoración:</b> ".date('d/m/Y H:i', strtotime($valoracion->fechaValoracion))."</p>
                                    <p class='m-0'><b>Comentario:</b> $valoracion->comentario</p>
                                    <p class='m-0'><b>Valoración: </b>
                                        <span>";
                    for ($i = 0; $i <$valoracion->valor; $i++)
                        $output.= "<i class='text-warning fa fa-star'></i>";
                    $output.= "</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenPlato)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $valoraciones = array(
                'datos'  => $output,
            );

            echo json_encode($valoraciones);
        }
    }

    public function orderValoracionesEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('fechaValoracion','asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('fechaValoracion','desc')
                    ->get();
            }
            else if ($query == "valorAsc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('valor','asc')
                    ->get();
            }
            else if ($query == "valorDesc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('valor','desc')
                    ->get();
            }
            else {}


            foreach($valoraciones as $valoracion)
            {
                $output .= "<div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                         <div class='row mt-2'>
                            <a class='btn btn-secundary' href='".url('/updateValoracion',$valoracion->id)."'>Editar esta valoración</a>
                        </div>
                    </div>
                    <div class='col-sm-6 text-left'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='tab-content'>
                                    <h1 class='text-title'>$valoracion->ciudad ~ $valoracion->zona</h1>
                                    <hr>
                                    <p class='m-0'><b>Nombre del usuario que valora:</b> $valoracion->name</p>
                                    <p class='m-0'><b>Email del usuario que valora:</b> $valoracion->email</p>
                                    <p class='m-0'><b>Fecha de Valoración:</b> ".date('d/m/Y H:i', strtotime($valoracion->fechaValoracion))."</p>
                                    <p class='m-0'><b>Comentario:</b> $valoracion->comentario</p>
                                    <p class='m-0'><b>Valoración: </b>
                                        <span>";
                for ($i = 0; $i <$valoracion->valor; $i++)
                    $output.= "<i class='text-warning fa fa-star'></i>";
                $output.= "</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenPlato)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                </div>";
            }

            $valoraciones = array(
                'datos'  => $output,
            );

            echo json_encode($valoraciones);
        }
    }

    public function buscaValoracionesEditar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $valoraciones->count();
            if($total_row > 0)
            {
                foreach($valoraciones as $valoracion)
                {
                    $output .= "<div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                         <div class='row mt-2'>
                            <a class='btn btn-secundary' href='".url('/updateValoracion',$valoracion->id)."'>Editar esta valoración</a>
                        </div>
                    </div>
                    <div class='col-sm-6 text-left'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='tab-content'>
                                    <h1 class='text-title'>$valoracion->ciudad ~ $valoracion->zona</h1>
                                    <hr>
                                    <p class='m-0'><b>Nombre del usuario que valora:</b> $valoracion->name</p>
                                    <p class='m-0'><b>Email del usuario que valora:</b> $valoracion->email</p>
                                    <p class='m-0'><b>Fecha de Valoración:</b> ".date('d/m/Y H:i', strtotime($valoracion->fechaValoracion))."</p>
                                    <p class='m-0'><b>Comentario:</b> $valoracion->comentario</p>
                                    <p class='m-0'><b>Valoración: </b>
                                        <span>";
                    for ($i = 0; $i <$valoracion->valor; $i++)
                        $output.= "<i class='text-warning fa fa-star'></i>";
                    $output.= "</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenPlato)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $valoraciones = array(
                'datos'  => $output,
            );

            echo json_encode($valoraciones);
        }
    }

    public function orderValoracionesEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query == "fechaAsc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('fechaValoracion','asc')
                    ->get();
            }
            else if ($query == "fechaDesc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('fechaValoracion','desc')
                    ->get();
            }
            else if ($query == "valorAsc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('valor','asc')
                    ->get();
            }
            else if ($query == "valorDesc") {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->orderBy('valor','desc')
                    ->get();
            }
            else {}


            foreach($valoraciones as $valoracion)
            {
                $output .= "<div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                         <div class='row mt-2'>
                            <a href='".url('/deleteValoracion', $valoracion->id)."' onclick=\"return confirm('¿Estas seguro de eliminar esta valoración?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar esta valoración</a>
                        </div>
                    </div>
                    <div class='col-sm-6 text-left'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='tab-content'>
                                    <h1 class='text-title'>$valoracion->ciudad ~ $valoracion->zona</h1>
                                    <hr>
                                    <p class='m-0'><b>Nombre del usuario que valora:</b> $valoracion->name</p>
                                    <p class='m-0'><b>Email del usuario que valora:</b> $valoracion->email</p>
                                    <p class='m-0'><b>Fecha de Valoración:</b> ".date('d/m/Y H:i', strtotime($valoracion->fechaValoracion))."</p>
                                    <p class='m-0'><b>Comentario:</b> $valoracion->comentario</p>
                                    <p class='m-0'><b>Valoración: </b>
                                        <span>";
                for ($i = 0; $i <$valoracion->valor; $i++)
                    $output.= "<i class='text-warning fa fa-star'></i>";
                $output.= "</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenPlato)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                </div>";
            }

            $valoraciones = array(
                'datos'  => $output,
            );

            echo json_encode($valoraciones);
        }
    }

    public function buscaValoracionesEliminar(Request $request) {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '') {
                $valoraciones = Valoracion::join('platos','idPlato','platos.id')
                    ->join('users','idUsuario','users.id')
                    ->join('restaurantes','idRestaurante','restaurantes.id')
                    ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato','valoraciones.id')
                    ->where('name', 'rlike', $query)
                    ->orWhere('email', 'rlike', $query)
                    ->get();
            }
            else {}


            $total_row = $valoraciones->count();
            if($total_row > 0)
            {
                foreach($valoraciones as $valoracion)
                {
                    $output .= "<div class='row mt-5'>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenusuario)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                         <div class='row mt-2'>
                            <a href='".url('/deleteValoracion', $valoracion->id)."' onclick=\"return confirm('¿Estas seguro de eliminar esta valoración?')\" class='btnAnular estiloEnlaces'><i class='fas fa-trash fa-2x'></i> Eliminar esta valoración</a>
                        </div>
                    </div>
                    <div class='col-sm-6 text-left'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='tab-content'>
                                    <h1 class='text-title'>$valoracion->ciudad ~ $valoracion->zona</h1>
                                    <hr>
                                    <p class='m-0'><b>Nombre del usuario que valora:</b> $valoracion->name</p>
                                    <p class='m-0'><b>Email del usuario que valora:</b> $valoracion->email</p>
                                    <p class='m-0'><b>Fecha de Valoración:</b> ".date('d/m/Y H:i', strtotime($valoracion->fechaValoracion))."</p>
                                    <p class='m-0'><b>Comentario:</b> $valoracion->comentario</p>
                                    <p class='m-0'><b>Valoración: </b>
                                        <span>";
                    for ($i = 0; $i <$valoracion->valor; $i++)
                        $output.= "<i class='text-warning fa fa-star'></i>";
                    $output.= "</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='row'>
                            <div class='text-center'>
                                <img src='".asset($valoracion->imagenPlato)."' class='img-circle img-thumbnail'>
                            </div>
                        </div>
                    </div>
                </div>";
                }

            } else {
                $output = " <div class='row mb-3 text-uppercase'>
                    <div class='col-12 text-center'>
                        <h4>Ningún usuario coincide con esos parámetros</h4>
                    </div>
            </div>";
            }

            $valoraciones = array(
                'datos'  => $output,
            );

            echo json_encode($valoraciones);
        }
    }

    public function newValoracion() {
        $reservas = Reserva::join('users','idUsuario','users.id')
            ->join('restaurantes','idRestaurante','restaurantes.id')
            ->select('reservas.idUsuario','reservas.idRestaurante','users.name','users.email','restaurantes.ciudad','restaurantes.zona')
            ->get();

        $platos = Plato::all();
        return view('admin.valoraciones.newValoracion',array('reservas' => $reservas, 'platos' => $platos));
    }

    public function postNewValoracion(Request $request) {
        $valoracion = new Valoracion();
        $values =  $request->input('usuarioRestaurante');
        $idUsuario = (int)substr($values,0,1);
        if (is_numeric((int)substr("$values",2,1)))
            $idRestaurante = (int)substr("$values",1,2);
        else
            $idRestaurante = (int)substr("$values",1,1);
        $valoracion->idUsuario = $idUsuario;
        $valoracion->idRestaurante = $idRestaurante;
        $valoracion->idPlato = $request->input('plato');
        $valoracion->fechaValoracion = $request->input('datetime');
        $valoracion->comentario = $request->input('comentario');
        $valoracion->valor = $request->input('valor');
        $valoracion->save();
        flash('Nueva valoración creada correctamente');
        return redirect('/selectValoraciones');
        echo $idUsuario. " ".$idRestaurante;
    }

    public function updateValoracion() {
        $valoraciones = DB::table('valoraciones')->join('platos','idPlato','platos.id')
            ->join('users','idUsuario','users.id')
            ->join('restaurantes','idRestaurante','restaurantes.id')
            ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
            ->paginate(5);
        return view("admin.valoraciones.viewValoraciones",compact('valoraciones'));
    }

    public function viewUpdateValoracion($id) {
        $valoraciones = Valoracion::join('platos','idPlato','platos.id')
            ->join('users','idUsuario','users.id')
            ->join('restaurantes','idRestaurante','restaurantes.id')
            ->select('users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','valoraciones.idPlato','platos.nombrePlato','valoraciones.id','valoraciones.idUsuario','valoraciones.idRestaurante')
            ->where('valoraciones.id','=',$id)
            ->get();

        $reservas = Reserva::join('users','idUsuario','users.id')
        ->join('restaurantes','idRestaurante','restaurantes.id')
        ->select('reservas.idUsuario','reservas.idRestaurante','users.name','users.email','restaurantes.ciudad','restaurantes.zona')
        ->get();

        $platos = Plato::all();
        return view("admin.valoraciones.updateValoracion",array('valoraciones' => $valoraciones, 'reservas' => $reservas, 'platos' => $platos));
    }

    public function postUpdateValoracion(Request $request) {
        $valoracion = Valoracion::find($request->input('ocultoValoracion'));
        $values =  $request->input('usuarioRestaurante');
        $idUsuario = (int)substr($values,0,1);
        if (is_numeric((int)substr("$values",2,1)))
            $idRestaurante = (int)substr("$values",1,2);
        else
            $idRestaurante = (int)substr("$values",1,1);
        $valoracion->idUsuario = $idUsuario;
        $valoracion->idRestaurante = $idRestaurante;
        $valoracion->idPlato = $request->input('plato');
        $valoracion->fechaValoracion = $request->input('datetime');
        $valoracion->comentario = $request->input('comentario');
        $valoracion->valor = $request->input('valor');
        $valoracion->save();
        flash('Valoración actualizada correctamente');
        return redirect('/updateValoracion');
    }

    public function deleteValoracion() {
        $valoraciones = DB::table('valoraciones')->join('platos','idPlato','platos.id')
            ->join('users','idUsuario','users.id')
            ->join('restaurantes','idRestaurante','restaurantes.id')
            ->select('users.imagenusuario','users.name','users.email','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona','platos.imagenPlato')
            ->paginate(5);
        return view("admin.valoraciones.viewValoraciones",compact('valoraciones'));
    }

    public function borrarValoracion($id) {
        $valoracion = Valoracion::find($id);
        $valoracion->delete();
        flash('Valoración eliminada correctamente');
        return redirect('/deleteValoracion');
    }
}
