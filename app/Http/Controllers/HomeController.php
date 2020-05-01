<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function  getPerfil() {
        $misReservas = Reserva::join('restaurantes','idRestaurante', '=', 'restaurantes.id')->select('restaurantes.zona','restaurantes.ciudad','reservas.nombrePersona','reservas.personas','reservas.fechaReserva','reservas.horaReserva','reservas.id')->where('reservas.idUsuario', '=', Auth::user()->id)->get();
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
