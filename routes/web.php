<?php

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
Route::prefix('/')->group( function () {
	Auth::routes();
	Route::get('/', function () { return view('auth.login'); });
});

Route::prefix('admin')->middleware('auth')->group( function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/representantes','RepresentantesController');
	Route::resource('/personal','PersonalController');
	Route::resource('/atletas','AtletasController');
	Route::get('/municipios/{id}/buscar','AtletasController@obtenerMunicipios');
	Route::get('/parroquias/{id}/buscar','AtletasController@obtenerParroquias');
	Route::get('/categorias/{edad}/buscar','AtletasController@buscarcategoria');
	Route::resource('/cuotascampeonatos','CuotasCampeonatosController');
	Route::get('/cuotascampeonatos/editar/{id_mes}/{anio}/{campeonato}','CuotasCampeonatosController@editar');
	//Route::get('/cuotascampeonatos/mostrar','CuotasCampeonatosController@mostrar');
	
});
