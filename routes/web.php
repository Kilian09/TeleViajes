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



//REDIRECCIONAMIENTO DE VISTAS A USERCONTROLLER
Route::get('/login', 'userController@login');
Route::get('/register', 'userController@register');



//PRODUCTCONTROLLER AJAX

Route::get('/numero_productos', 'ProductController@numero_productos');
Route::get('/get_numTransc', 'ProductController@get_numTransc');

//PRODUCTCONTROLLER
Route::get('/crearProducto', 'ProductController@crearProducto');
Route::post('/addProducto', 'ProductController@addProducto');
Route::get('/shopAdmin', 'ProductController@listaProductos');
Route::get('/paquetes', 'ProductController@listaPaquetes');
Route::get('/cruceros', 'ProductController@listaCruceros');
Route::get('/actividades', 'ProductController@listaActividades');
Route::get('/escolares', 'ProductController@listaEscolares');
Route::get('/universitarios', 'ProductController@listaUniversitarios');
Route::get('/vuelos', 'ProductController@listaVuelos');
Route::get('/ancianos', 'ProductController@listaAncianos');
Route::get('/familia', 'ProductController@listaFamilias');



Route::get('/shopAdmin/eliminarProducto', 'ProductController@eliminarProducto');
Route::get('/shopAdmin/actualizarProducto', 'ProductController@actualizarProducto');
Route::post('/procesar_producto_actualizado', 'ProductController@procesar_producto_actualizado');



//USERCONTROLLER
Route::post('/procesar_login', 'userController@procesar_login');
Route::post('/procesar_registro', 'userController@procesar_registro');
Route::get("/cerrar_session","UserController@cerrar_session");
Route::post('/procesar_contacto', 'userController@procesar_contacto');



Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/usuario', function () {
    return view('usuario');
});

//PRODUCTO

