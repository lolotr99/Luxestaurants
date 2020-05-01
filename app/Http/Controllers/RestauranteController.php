<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class RestauranteController extends Controller
{
    public function getRestaurantes() {
        $restaurantes = Restaurante::all();
        return view('locales',array('arrayRestaurantes' => $restaurantes));
    }

    public function detallesRestaurante($id){
        $restaurante = Restaurante::find($id);
        return view('details',array('restaurante' => $restaurante));
    }

    public function reservar(Request $request) {
        $idRestaurante = $request->input('ocultoRestaurante');
        $idUsuario = $request->input('ocultoUsuario');
        $nombre = $request->input('nombre');
        $nPersonas = $request->input('numeroPersonas');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');

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
            $reserva->horaReserva = $hora;
            $restaurante->numeromesas--;
            $reserva->save();
            $restaurante->save();
        }
        return redirect('/locales');
    }

    public function createPDF() {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download();
    }

}
