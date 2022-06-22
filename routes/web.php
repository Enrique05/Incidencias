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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prtg', function(){
	return view('prtg/prtg');
});
Route::get('/tarjetas-pixel',function(){
	return view('tarjetas-pixel');
});

Route::get('/ruleta', function(){
	return view('ruleta');
});

Route::resource('/incidents','IncidentController');
Route::resource('/clientes','ClientesController');
Route::resource('/comments','CommentController');
Route::resource('/incidentsvue','IncidentVueController');//Frontend vue

Route::get('incidents/atender/{incident}', 'IncidentController@atender')->name('atender');//Ruta de prueba para ejecutar la atencion del operador
Route::get('incidents/cerrar/{incident}', 'IncidentController@cerrar')->name('cerrar');//Ruta de prueba para 

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');//ruta por defecto auth

// Vistas frontend

Route::get('/vue', function(){
	return view('frontend.index');
});

Route::get('/frontend',function(){
	return view('frontend');
});

Route::get('/vue-view',function(){
	return view('vue.incidents');
});

Route::get('/vuetify',function(){
	return view('vuetify.index');
});

Route::get('/vue-listar',function(){
	return view('vuetify.listar');
});