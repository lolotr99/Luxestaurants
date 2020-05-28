<?php

namespace App\Http\Controllers;

use App\Plato;
use App\Reserva;
use App\Restaurante;
use App\User;
use App\Valoracion;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class RestauranteController extends Controller
{
    public function getIndex()
    {
        return view('home');
    }

    public function getRestaurantes() {
        $restaurantes = Restaurante::all();
        return view('locales',array('arrayRestaurantes' => $restaurantes));
    }

    public function action(Request $request) {
        if($request->ajax())
        {
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
                    $output .= "
 <div class='row mb-3 text-uppercase' style='background: #F9F9F9;'>
                <div class='col-4'>
                    <h4>{$restaurante->ciudad}</h4>
                </div>
                <div class='col-8'>
                    <h5><a class='estiloEnlaces' href=".url('/locales',$restaurante->id)."\>{$restaurante->zona}</a>  • {$restaurante->telefono}</h5>
                </div>
            </div>
        ";
                }
            } else {
                $output = "
                 <div class='row mb-3 text-uppercase' style='background: #F9F9F9;'>
                    <div class='col-12 text-center'>
                        <h4>No tenemos restaurantes en ese lugar</h4>
                    </div>
            </div>
       ";
            }

            $data = array(
                'datos'  => $output,
            );

            echo json_encode($data);
        }
    }

    public function detallesRestaurante($id){
        $restaurante = Restaurante::find($id);
        return view('details',array('restaurante' => $restaurante));
    }

    public function getCarta() {
        $carta = Plato::all();
        return view('carta', array('carta' => $carta));
    }

    public function detailsPlato($id) {
        $plato = Plato::find($id);

        if (Auth::check())
        {
            $restaurantes = Reserva::join('restaurantes','idRestaurante','restaurantes.id')
                ->select('restaurantes.id','restaurantes.ciudad','restaurantes.zona')
                ->where('reservas.idUsuario','=',auth()->user()->id)
                ->get();
        } else {
            $restaurantes = array();
        }
        $nValoraciones = Valoracion::select(['valoraciones.*'])->where('valoraciones.idPlato','=',$plato->id)->count();

        $valoracionesPlato = Valoracion::join('platos','idPlato','platos.id')
            ->join('users','idUsuario','users.id')
            ->join('restaurantes','idRestaurante','restaurantes.id')
            ->select('users.id AS idUsuario','users.imagenusuario','users.name','valoraciones.id','valoraciones.idPlato','valoraciones.fechaValoracion','valoraciones.comentario','valoraciones.valor','restaurantes.ciudad','restaurantes.zona')
            ->where('valoraciones.idPlato','=',$plato->id)
            ->get();


        return view('detailsPlato', array("plato" => $plato, "restaurantes" => $restaurantes,"nValoraciones" => $nValoraciones, "valoraciones" => $valoracionesPlato));
    }

    public function valorar(Request $request) {
        $valoracion = new Valoracion();
        $valoracion->idUsuario = auth()->user()->id;
        $valoracion->idRestaurante = $request->input('restaurante');
        $valoracion->idPlato = $request->input('ocultoPlato');
        $valoracion->fechaValoracion = date(now());
        $valoracion->comentario = $request->input('comentario');
        $valoracion->valor = $request->input('estrellas');
        $valoracion->save();
        flash('Valoración realizada con éxito');
        return redirect('/carta/'.$request->input('ocultoPlato'));
    }

    public function eliminarValoracion($id,$idPlato) {
        $valoracion = Valoracion::find($id);
        $valoracion->delete();
        flash('Tu valoración ha sido eliminada cor éxito');
        return redirect('/carta/'.$idPlato);
    }

    public function getPerfil() {
        $misReservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')->select('restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')->where('reservas.idUsuario', '=', Auth::user()->id)->get();
        $reservas = Reserva::select(['reservas.*'])->where('reservas.idUsuario', '=', Auth::user()->id)->count();
        return view('perfil', array('reservas' => $misReservas, 'numeroReservas' => $reservas));
    }

    public function editarPerfil() {
        return view('editarPerfil',array('user' => auth()->user()));
    }

    public function postEditPerfil(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('nombreUsuario');
        $user->password = bcrypt($request->input('contrasenia'));
        $user->fechanacimiento = $request->input('fechaNacimiento');
        if ($request->hasFile('imagenUsuario')) {
            $user->imagenusuario = $request->file('imagenUsuario')->move('img',$request->file('imagenUsuario')->getClientOriginalName());
        } else {
            $user->imagenusuario = $request->input('ocultoImagenAntigua');
        }
        $user->save();
        flash('Perfil editado correctamente');
        return redirect('/miPerfil');
    }

    public function descargarPDF($id) {
        $pdf = App::make('dompdf.wrapper');
        $reserva = Reserva::find($id);
        $restaurante = Restaurante::find($reserva->idRestaurante);
        $fechaOriginal = new DateTime($reserva->fechaReserva);
        $fechaFinal = date_format($fechaOriginal,'d-m-Y')." a las ".date_format($fechaOriginal,'H:i');
        $html = "
<style>
div.centrar{
    text-align: center;
}

.margenIzq{
margin-left: 35px;
}

.bordeHr{
border: 1px solid black;
}

</style>
    <img src='img/logo1.png'>
    <h1>Tu reserva ha sido realizada con éxito</h1><br>
    <h4 class='margenIzq'>¡Gracias por confiar en Luxestaurants!</h4><br>
        <hr class='bordeHr'><br><br>
        <h3 class='margenIzq'>Código de reserva #LUX000$reserva->id</h3>
        <span><b>$restaurante->zona</b></span><br>
        <span>$restaurante->ciudad</span><br>
        <hr>
        <div>
            <span>Ver todos los detalles de la reserva</span><br>
            <div class='centrar'>
                <span>Mesa para: <b>$reserva->personas personas</b></span><br>
                <span>Mesa a nombre de: <b>$reserva->nombrePersona</b></span><br>
                <span>Hora de la reserva: <b>$fechaFinal</b></span>
            </div>
        </div>
    </div>
</div>
";
        $pdf->loadHTML($html);
        return $pdf->download('reserva.pdf');
    }

    public function reservar(Request $request) {
        $idRestaurante = $request->input('ocultoRestaurante');
        $idUsuario = Auth::id();
        $nombre = $request->input('nombre');
        $nPersonas = $request->input('numeroPersonas');
        $fechaOriginal = new DateTime($request->input('datetime'));
        $fechaFinal = date_format($fechaOriginal,'d-m-Y')." a las ".date_format($fechaOriginal,'H:i');

        $restaurante = Restaurante::find($idRestaurante);

        if ($restaurante->numeromesas <= 0) {
            //no hay sitio para reservar
            abort('360');
        } else {
            $reserva = new Reserva();
            $reserva->idUsuario = $idUsuario;
            $reserva->idRestaurante = $idRestaurante;
            $reserva->nombrePersona = $nombre;
            $reserva->personas = $nPersonas;
            $reserva->fechaReserva = $request->input('datetime');
            $restaurante->numeromesas--;
            $reserva->save();
            $restaurante->save();

            $pdf = App::make('dompdf.wrapper');
            $html = "
<style>
div.centrar{
    text-align: center;
}

.margenIzq{
margin-left: 35px;
}

.bordeHr{
border: 1px solid black;
}

</style>
    <img src='img/logo1.png'>
    <h1>Tu reserva ha sido realizada con éxito</h1><br>
    <h4 class='margenIzq'>¡Gracias por confiar en Luxestaurants!</h4><br>
        <hr class='bordeHr'><br><br>
        <h3 class='margenIzq'>Código de reserva #LUX000$reserva->id</h3>
        <span><b>$restaurante->zona</b></span><br>
        <span>$restaurante->ciudad</span><br>
        <hr>
        <div>
            <span>Ver todos los detalles de la reserva</span><br>
            <div class='centrar'>
                <span>Mesa para: <b>$nPersonas personas</b></span><br>
                <span>Mesa a nombre de: <b>$nombre</b></span><br>
                <span>Hora de la reserva: <b>$fechaFinal</b></span>
            </div>
        </div>
    </div>
</div>
";
            $pdf->loadHTML($html);

            $data = array(
                'email' => Auth::user()->email,
                'subject' => 'Reserva en Luxestaurants',
                'bodyMessage' => 'Tu reserva ha sido realizada con éxito. Recuerda que debes presentar este pdf para acceder a nuestro restaurante. También puedes anular la reserva en cualquier momento. Un saludo y esperamos que disfrutes de la experiencia en Luxestaurants.',
                'a_file' => $pdf
            );


            Mail::send('emails.reservar', $data, function ($message) use ($data) {
                $message->from('aboutluxestaurants@gmail.com', 'Admin Luxestaurants');
                $message->to($data['email']);
                $message->subject($data['subject']);
                $message->attachData($data['a_file']->output(), 'reserva.pdf');
            });

            flash('Consulta tu correo electrónico, tienes una mensaje con la información de la reserva');
            return redirect('/miPerfil');
        }

    }

    public function anularReserva($id) {
        $reserva = Reserva::find($id);
        $restaurante = Restaurante::find($reserva->idRestaurante);
        $restaurante->numeromesas++;
        $restaurante->save();
        $reserva->delete();

        $data = array(
            'email' => Auth::user()->email,
            'subject' => 'Cancelación en Luxestaurants',
            'bodyMessage' => 'Tu reserva ha sido anulada. Si tienes alguna duda puedes ponerte en contacto con nosotros y te resolveremos cualquier problema. También puedes pedir una modificación de tu reserva. Un saludo desde el equipo de Luxestaurants'
        );


        Mail::send('emails.anular', $data, function ($message) use ($data) {
            $message->from('aboutluxestaurants@gmail.com', 'Admin Luxestaurants');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        flash('Se ha anulado la reserva. Consulta tu correo electrónico');
        return redirect('/miPerfil');
    }

    public function aboutUs() {
        return view('about');
    }

    public function contact(Request $request) {
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $asunto = $request->input('subject');
        $mensaje = $request->input('message');

        $data = array(
            'email' => $email,
            'subject' => $asunto,
            'bodyMessage' => $mensaje,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'phone' => $phone
        );

        //Envias correo al admin con el asunto
        Mail::send('emails.envioDatos', $data, function ($message) use ($data) {
            $message->from('manolotoro80@gmail.com', $data['nombre'].' '.$data['apellidos']);
            $message->to('aboutluxestaurants@gmail.com');
            $message->subject($data['subject']);
        });

        //El admin te manda un correo diciendo que alguien se pondrá en contacto contigo en breves
        Mail::send('emails.contacto', $data, function ($message) use ($data) {
            $message->from('aboutluxestaurants@gmail.com','Admin Luxestaurants');
            $message->to($data['email']);
            $message->subject('Recibido correo de contacto');
        });

        flash('Se ha enviado un email al administrador con tu información y el asunto indicado');
        return redirect('/about');
    }

}
