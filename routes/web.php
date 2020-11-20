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
    return view('welcome');*/
Route::get('Relacion','ProductosController@Relacion');
Route::get('Productos','ProductosController@getProductos');
Route::get('NewProduct','ProductosController@createProductos');
Route::get('Comentarioss','ComentariossController@getComentario');
Route::get('ComentarioNuevo','ComentariossController@nuevoComentario');
Route::get('ProductoComentario','ComentariossController@comentarioProducto');
Route::get('Eliminar','ComentariossController@delete');
Route::get('EliminarProductos','ComentariossController@Delete');
Route::put('actualizarProducto/{id}','ProductosController@actualizar');
Route::put('actualizarComentario/{id}','ComentariossController@actualizar');
Route::get('Personas','PersonasController@getPersonas');
Route::get('NewPersona','PersonasController@createPersona');
Route::get('Relacion','PersonasController@Relacion');
Route::get('Eliminar','PersonasController@Delete');
Route::put('actualizarPersona/{id}','PersonasController@UpdatePersona');
Route::get('RelacionTodo','PersonasController@RelacionTotal');
Route::post("Productos2",['middleware'=>'validar',"ProductosController@ejemplo"]);
//});
