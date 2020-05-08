<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'RestauranteController@getIndex');
Route::get('/locales', 'RestauranteController@getRestaurantes');
Route::get('/carta','RestauranteController@getCarta');
Route::get('/locales/{id}','RestauranteController@detallesRestaurante');
Route::post('/pruebaCorreo','RestauranteController@pruebaCorreo');

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function() {
    Route::post('/reservar', 'RestauranteController@reservar');
    Route::get('/miPerfil', 'RestauranteController@getPerfil');
    Route::get('/anularReserva/{id}', 'RestauranteController@anularReserva');
    Route::get('/descargarPDF/{id}', 'RestauranteController@descargarPDF');

});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
