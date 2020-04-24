<?php

namespace App\Http\Controllers;

use App\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function getRestaurantes() {
        $restaurantes = Restaurante::all();
        return view('locales',array('arrayRestaurantes' => $restaurantes));
    }
}
