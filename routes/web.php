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

Route::get('/', 'HomeController@index');
Route::get('/locales', 'RestauranteController@getRestaurantes')->middleware('verified');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/locales/{id}','RestauranteController@detallesRestaurante');
    Route::post('/reservar','RestauranteController@reservar');
    Route::get('/miPerfil','HomeController@getPerfil');
    Route::get('/anularReserva/{id}','HomeController@anularReserva');
    Route::get('/descargar','RestauranteController@createPDF');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
