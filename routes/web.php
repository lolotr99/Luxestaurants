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

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function() {
    Route::get('/control','AdminController@getControl');

    Route::get('/selectUsers','AdminController@getUsers');
    Route::get('/orderUsers/filtro','AdminController@orderUsers')->name('orderUsers.filtro');
    Route::get('/newUser','AdminController@newUser');
    Route::post('/postNewUser','AdminController@postNewUser');
    Route::get('/updateUser','AdminController@updateUser');
    Route::get('/orderUsersEditar/filtroEditar','AdminController@orderUsersEditar')->name('orderUsersEditar.filtroEditar');
    Route::get('/updateUser/{id}','AdminController@viewUpdateUser');
    Route::post('/postUpdateUser','AdminController@postUpdateUser');
    Route::get('/deleteUser','AdminController@deleteUser');
    Route::get('/orderUsersEliminar/filtroEliminar','AdminController@orderUsersEliminar')->name('orderUsersEliminar.filtroEliminar');
    Route::get('/deleteUser/{id}', 'AdminController@borrarUsuario');


    Route::get('/selectRestaurantes','AdminController@getRestaurantes');
    Route::get('/selectRestaurantes/buscador','AdminController@buscaSelectLocales')->name('selectRestaurantes.buscador');
    Route::get('/newRestaurante','AdminController@newRestaurante');
    Route::post('/postNewRestaurante','AdminController@postNewRestaurante');
    Route::get('/updateRestaurante','AdminController@updateRestaurante');
    Route::get('/selectRestaurantesUpdate/buscadorUpdate','AdminController@buscaLocalesUpdate')->name('selectRestaurantesUpdate.buscadorUpdate');
    Route::get('/updateRestaurante/{id}','AdminController@viewUpdateRestaurante');
    Route::post('/postUpdateRestaurante','AdminController@postUpdateRestaurante');
    Route::get('/deleteRestaurante','AdminController@deleteRestaurante');
    Route::get('/selectRestaurantesDelete/buscadorDelete','AdminController@buscaLocalesDelete')->name('selectRestaurantesDelete.buscadorDelete');
    Route::get('/deleteRestaurante/{id}', 'AdminController@borrarRestaurante');


    Route::get('/selectPlatos','AdminController@getPlatos');
    Route::get('/newPlato','AdminController@newPlato');
    Route::get('/updatePlato','AdminController@updatePlato');
    Route::get('/deletePlato','AdminController@deletePlato');

    Route::get('/selectReservas','AdminController@getReservas');
    Route::get('/newReserva','AdminController@newReserva');
    Route::get('/updateReserva','AdminController@updateReserva');
    Route::get('/deleteReserva','AdminController@deleteReserva');

    Route::get('/selectValoraciones','AdminController@getValoraciones');
    Route::get('/newValoracion','AdminController@newValoracion');
    Route::get('/updateValoracion','AdminController@updateValoracion');
    Route::get('/deleteValoracion','AdminController@deleteValoracion');
});


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
