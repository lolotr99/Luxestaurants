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
Route::get('/localesAjax/action','RestauranteController@action')->name('localesAjax.action');
Route::get('/locales/{id}','RestauranteController@detallesRestaurante');
Route::get('/carta','RestauranteController@getCarta');
Route::get('/carta/{id}','RestauranteController@detailsPlato');
Route::get('/about', 'RestauranteController@aboutUs');
Route::post('/contacto','RestauranteController@contact');

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function() {
    Route::post('/reservar', 'RestauranteController@reservar');
    Route::get('/anularReserva/{id}', 'RestauranteController@anularReserva');
    Route::get('/descargarPDF/{id}', 'RestauranteController@descargarPDF');
    Route::get('/miPerfil', 'RestauranteController@getPerfil');
    Route::get('/editarPerfil', 'RestauranteController@editarPerfil');
    Route::post('/postEditPerfil','RestauranteController@postEditPerfil');
    Route::post('/valorar','RestauranteController@valorar');
    Route::get('/eliminarValoracion/{id}/{idPlato}', 'RestauranteController@eliminarValoracion');
});


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
