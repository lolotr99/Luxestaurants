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
Route::get('/carta/filtroCarta','RestauranteController@filtrarCarta')->name('carta.filtroCarta');
Route::get('/carta/{id}','RestauranteController@detailsPlato');
Route::get('/about', 'RestauranteController@aboutUs');
Route::post('/contacto','RestauranteController@contact');

Route::group(['middleware' => 'auth',  'middleware' => 'verified'], function() {
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
    Route::get('/buscaUsers/buscadorUsers','AdminController@buscarUsers')->name('buscaUsers.buscadorUsers');
    Route::get('/newUser','AdminController@newUser');
    Route::post('/postNewUser','AdminController@postNewUser');
    Route::get('/updateUser','AdminController@updateUser');
    Route::get('/orderUsersEditar/filtroEditar','AdminController@orderUsersEditar')->name('orderUsersEditar.filtroEditar');
    Route::get('/buscaUsersEditar/buscadorUsersEditar','AdminController@buscarUsersEditar')->name('buscaUsersEditar.buscadorUsersEditar');
    Route::get('/updateUser/{id}','AdminController@viewUpdateUser');
    Route::post('/postUpdateUser','AdminController@postUpdateUser');
    Route::get('/deleteUser','AdminController@deleteUser');
    Route::get('/orderUsersEliminar/filtroEliminar','AdminController@orderUsersEliminar')->name('orderUsersEliminar.filtroEliminar');
    Route::get('/buscaUsersEliminar/buscadorUsersEliminar','AdminController@buscarUsersEliminar')->name('buscaUsersEliminar.buscadorUsersEliminar');
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
    Route::get('/orderPlatos/filtroPlato','AdminController@orderPlatos')->name('orderPlatos.filtroPlato');
    Route::get('/buscaPlatos/buscadorPlatos','AdminController@buscarPlatos')->name('buscaPlatos.buscadorPlatos');
    Route::get('/newPlato','AdminController@newPlato');
    Route::post('/postNewPlato','AdminController@postNewPlato');
    Route::get('/updatePlato','AdminController@updatePlato');
    Route::get('/orderPlatosEditar/filtroPlatoEditar','AdminController@orderPlatosEditar')->name('orderPlatosEditar.filtroPlatoEditar');
    Route::get('/buscaPlatosEditar/buscadorPlatosEditar','AdminController@buscarPlatosEditar')->name('buscaPlatosEditar.buscadorPlatosEditar');
    Route::get('/updatePlato/{id}','AdminController@viewUpdatePlato');
    Route::post('/postUpdatePlato','AdminController@postUpdatePlato');
    Route::get('/deletePlato','AdminController@deletePlato');
    Route::get('/orderPlatosEliminar/filtroPlatoEliminar','AdminController@orderPlatosEliminar')->name('orderPlatosEliminar.filtroPlatoEliminar');
    Route::get('/buscaPlatosEliminar/buscadorPlatosEliminar','AdminController@buscarPlatosEliminar')->name('buscaPlatosEliminar.buscadorPlatosEliminar');
    Route::get('/deletePlato/{id}', 'AdminController@borrarPlato');

    Route::get('/selectReservas','AdminController@getReservas');
    Route::get('/orderReservas/filtroReserva','AdminController@orderReservas')->name('orderReservas.filtroReserva');
    Route::get('/buscaReservas/buscadorReservas','AdminController@buscaReservas')->name('buscaReservas.buscadorReservas');
    Route::get('/newReserva','AdminController@newReserva');
    Route::post('/postNewReserva','AdminController@postNewReserva');
    Route::get('/updateReserva','AdminController@updateReserva');
    Route::get('/orderReservasEditar/filtroReservaEditar','AdminController@orderReservasEditar')->name('orderReservasEditar.filtroReservaEditar');
    Route::get('/buscaReservasEditar/buscadorReservasEditar','AdminController@buscaReservasEditar')->name('buscaReservasEditar.buscadorReservasEditar');
    Route::get('/updateReserva/{id}','AdminController@viewUpdateReserva');
    Route::post('/postUpdateReserva','AdminController@postUpdateReserva');
    Route::get('/deleteReserva','AdminController@deleteReserva');
    Route::get('/orderReservasEliminar/filtroReservaEliminar','AdminController@orderReservasEliminar')->name('orderReservasEliminar.filtroReservaEliminar');
    Route::get('/buscaReservasEliminar/buscadorReservasEliminar','AdminController@buscaReservasEliminar')->name('buscaReservasEliminar.buscadorReservasEliminar');
    Route::get('/deleteReserva/{id}', 'AdminController@borrarReserva');

    Route::get('/selectValoraciones','AdminController@getValoraciones');
    Route::get('/orderValoraciones/filtroValoracion','AdminController@orderValoraciones')->name('orderValoraciones.filtroValoracion');
    Route::get('/buscaValoraciones/buscadorValoraciones','AdminController@buscaValoraciones')->name('buscaValoraciones.buscadorValoraciones');
    Route::get('/newValoracion','AdminController@newValoracion');
    Route::post('/postNewValoracion','AdminController@postNewValoracion');
    Route::get('/updateValoracion','AdminController@updateValoracion');
    Route::get('/orderValoracionesEditar/filtroValoracionEditar','AdminController@orderValoracionesEditar')->name('orderValoracionesEditar.filtroValoracionEditar');
    Route::get('/buscaValoracionesEditar/buscadorValoracionesEditar','AdminController@buscaValoracionesEditar')->name('buscaValoracionesEditar.buscadorValoracionesEditar');
    Route::get('/updateValoracion/{id}','AdminController@viewUpdateValoracion');
    Route::post('/postUpdateValoracion','AdminController@postUpdateValoracion');
    Route::get('/deleteValoracion','AdminController@deleteValoracion');
    Route::get('/orderValoracionesEliminar/filtroValoracionEliminar','AdminController@orderValoracionesEliminar')->name('orderValoracionesEliminar.filtroValoracionEliminar');
    Route::get('/buscaValoracionesEliminar/buscadorValoracionesEliminar','AdminController@buscaValoracionesEliminar')->name('buscaValoracionesEliminar.buscadorValoracionesEliminar');
    Route::get('/deleteValoracion/{id}', 'AdminController@borrarValoracion');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
