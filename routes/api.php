<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('Relacion','ProductosController@Relacion');
Route::get('Productos','ProductosController@getProductos');
Route::get('NewProduct','ProductosController@createProductos')->middleware(['ChecarPermisos','auth:sanctum']);
Route::get('Comentarioss','ComentariossController@getComentario')->middleware(['ChecarPermisos','auth:sanctum']);
Route::get('ComentarioNuevo','ComentariossController@nuevoComentario')->middleware(['ChecarPermisos','auth:sanctum']);
Route::get('ProductoComentario','ComentariossController@comentarioProducto')->middleware(['ChecarPermisos','auth:sanctum']);
Route::get('Eliminar','ComentariossController@delete')->middleware(['ChecarPermisos','auth:sanctum']);
Route::get('EliminarProductos','ComentariossController@Delete')->middleware(['ChecarPermisos','auth:sanctum']);
Route::put('actualizarProducto/{id}','ProductosController@actualizar')->middleware(['ChecarPermisos','auth:sanctum']);
Route::put('actualizarComentario/{id}','ComentariossController@actualizar');
Route::get('Personas','PersonasController@getPersonas');
Route::get('NewPersona','PersonasController@createPersona');
Route::get('Relacion','PersonasController@Relacion');
Route::get('Eliminar','PersonasController@Delete');
Route::put('actualizarPersona/{id}','PersonasController@UpdatePersona');
Route::get('RelacionTodo','PersonasController@RelacionTotal');
Route::post("Productos2",'ProductosController@ejemplo')->middleware('validar');

Route::middleware('auth:sanctum')->delete('LogOut','UserController@LogOut');
Route::middleware('auth:sanctum')->get('users','UserController@index');

Route::post('Registro','UserController@Registro');
Route::post('Login','UserController@LogIn')->middleware('ValidacionCuenta');

Route::put('CambiarPermiso','UserController@actualizar')->middleware('admin');


Route::get('Http','HttpClienteController@conexion');
Route::get('CharacterID','HttpClienteController@personaje');
Route::get('seriesPersonaje','HttpClienteController@SeriesPersonaje')->middleware('idPersonaje');


//subir archivos 
Route::post('SubirPublico','DocumentosController@GuardatArchivo')->middleware('Documentos');
Route::post('SubirFotoPerfil','DocumentosController@GuardatArchivoPriv')->middleware(['Documentos','auth:sanctum']);

Route::post('Descargar','DocumentosController@DescargarArchivo');


Route::get('Validar/{id}','EmailController@ActualizarPermisos');
//});
