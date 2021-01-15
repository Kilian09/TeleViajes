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
    return view('index');
});



//REDIRECCIONAMIENTO DE VISTAS
Route::get('/login', 'userController@login');
Route::get('/register', 'userController@register');
Route::get('/cruceros', 'userController@cruceros');
Route::get('/paquetes', 'userController@paquetes');
Route::get('/actividades', 'userController@actividades');
Route::get('/universitarios', 'userController@universitarios');
Route::get('/ancianos', 'userController@ancianos');
Route::get('/escolares', 'userController@escolares');
Route::get('/familia', 'userController@familia');
Route::get('/shopAdmin', 'userController@shopAdmin');





//PROCESADO DE FORMULARIOS
Route::post('/procesar_login', 'userController@procesar_login');
Route::post('/procesar_registro', 'userController@procesar_registro');

Route::get("/cerrar_session","UserController@cerrar_session");


Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/procesar_contacto', 'userController@procesar_contacto');

