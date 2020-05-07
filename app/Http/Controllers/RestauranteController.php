<?php

namespace App\Http\Controllers;

use App\Plato;
use App\Reserva;
use App\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


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
            return redirect('/descargar');
        }

    }

    public function createPDF() {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download();
    }

    public function getCarta() {
        $carta = Plato::all();
        return view('carta', array('carta' => $carta));
    }

    public function getIndex()
    {
        return view('home');
    }

    public function  getPerfil() {
        $misReservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')->select('restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.id')->where('reservas.idUsuario', '=', Auth::user()->id)->get();
        return view('perfil', array('reservas' => $misReservas));
    }

    public function anularReserva($id) {
        $reserva = Reserva::find($id);
        $restaurante = Restaurante::find($reserva->idRestaurante);
        $restaurante->numeromesas++;
        $restaurante->save();
        $reserva->delete();
        return redirect('/miPerfil');
    }

}
