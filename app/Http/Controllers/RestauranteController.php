<?php

namespace App\Http\Controllers;

use App\Restaurante;

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

}
