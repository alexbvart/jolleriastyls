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

Route::get('/', 'UserController@showLogin');

Route::post('/', 'UserController@login')->name('login');

// Agregado
Route::get('/home', 'HomeController@index')->name('home');

// Agregado
Route::post('logout', 'UserController@logout')->name('logout');

//Categoria
Route::resource('categoria', 'categoriaController');

Route::get('/categoria/{id}/confirmar', 'categoriaController@confirmar')->name('categoria.confirmar');

//Unidad
Route::resource('unidad', 'UnidadController');

Route::get('/unidad/{id}/confirmar', 'UnidadController@confirmar')->name('unidad.confirmar');

//Producto
Route::resource('productos', 'ProductoController');

Route::get('/productos/{id}/confirmar', 'ProductoController@confirmar')->name('productos.confirmar');

//Clientes
Route::resource('clientes','ClienteController');

//Ventas

Route::resource('ventas', 'CabeceraVentaController');
Route::get('/EncontrarProducto/{producto_id}', 'CabeceraVentaController@ProductoCodigo');
Route::get('/EncontrarTipo/{tipo_id}', 'CabeceraVentaController@PorTipo');

