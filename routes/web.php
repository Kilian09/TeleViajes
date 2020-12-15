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



//PROCESADO DE FORMULARIOS
Route::post('/procesar_login', 'userController@procesar_login');
Route::post('/procesar_registro', 'userController@procesar_registro');

Route::get("/cerrar_session","UserController@cerrar_session");


//YO LO PONDRIA EN OTRO CONTROLADOR SOLO PARA CONTACTO
Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/procesar_contacto', 'userController@procesar_contacto');

