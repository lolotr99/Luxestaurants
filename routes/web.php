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

/*Route::get('/', function () {
    return view('home');
});*/
Route::get('/', 'RestauranteController@showPDF');


Route::get('/locales', 'RestauranteController@getRestaurantes');
Route::get('/locales/{id}','RestauranteController@detallesRestaurante');
Route::post('/reservar','RestauranteController@reservar');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
