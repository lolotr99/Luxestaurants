<?php

namespace App\Http\Controllers;

use App\Plato;
use App\Reserva;
use App\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

    public function detallesRestaurante($id){
        $restaurante = Restaurante::find($id);
        return view('details',array('restaurante' => $restaurante));
    }

    public function getCarta() {
        $carta = Plato::all();
        return view('carta', array('carta' => $carta));
    }

    public function  getPerfil() {
        $misReservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')->select('restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')->where('reservas.idUsuario', '=', Auth::user()->id)->get();
        return view('perfil', array('reservas' => $misReservas));
    }

    public function descargarPDF($id) {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download('reserva.pdf');
    }

    public function reservar(Request $request) {
        $idRestaurante = $request->input('ocultoRestaurante');
        $idUsuario = Auth::id();
        $nombre = $request->input('nombre');
        $nPersonas = $request->input('numeroPersonas');
        $fecha = $request->input('datetime');

        $restaurante = Restaurante::find($idRestaurante);

        if ($restaurante->numeromesas <= 0) {
            //no hay sitio para reservar
        } else {
            $reserva = new Reserva();
            $reserva->idUsuario = $idUsuario;
            $reserva->idRestaurante = $idRestaurante;
            $reserva->nombrePersona = $nombre;
            $reserva->personas = $nPersonas;
            $reserva->fechaReserva = $fecha;
            $restaurante->numeromesas--;
            $reserva->save();
            $restaurante->save();

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML('<h1>Test</h1>');

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

            flash('Se ha descargado un pdf con datos de la reserva. Consulta tu correo electrónico');
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
}
