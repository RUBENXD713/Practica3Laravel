<?php

namespace App\Http\Controllers;

use App\Comentarioss;
use App\ProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Log;
use App\Mail\correoPermisos;
use App\Mail\ComentarioNuevo;
use App\Mail\ComentarioNuevoProducto;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;


class ComentariossController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getComentario(Request $request)
    {
            return response()->json($comentario=Comentarioss::all(),200);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevoComentario(Request $request)
    {
        $producto=DB::table('productos')
        ->join('personas','personas.id','=','productos.persona')
        ->join('users','users.persona','=','personas.id')
        ->where('productos.id','=',$request->Producto)
        ->select('users.email')->get();
        $user=$request->user();
        $comentarios=new Comentarioss;
        $comentarios->Contenido=$request->Contenido;
        $comentarios->productos=$request->Producto;
        $comentarios->Persona=$request->usuario;
        $comentarios->save();
        Mail::to($user->email)->send(new ComentarioNuevo());
        Mail::to($producto)->send(new ComentarioNuevoProducto($user));
        return '¡Comentario guardado Guardado!';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comentarioProducto(Request $Nombre)
    {
        $products=DB::table('comentarios')
        ->join('productos','comentarios.productos','=','productos.id')
        ->where('productos.nombre','=',$Nombre->Producto)
        ->select('comentarios.id','comentarios.Contenido')
        ->get();
        return($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentarioss  $comentarioss
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $products=DB::table('comentarios')
        ->from('comentarios')
        ->where('comentarios.id','=',$request->id)
        ->delete();
        return 'Eliminacion Exitosa!!';      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentarioss  $comentarioss
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request,$id)
    {
        $comentario=Comentarioss::find ($id);  
        $comentario->Contenido=$request->mensaje;
        $comentario->productos=$request->producto;

        if($comentario->save())
        return response()->json(["Registro actualizado"=>$comentario]);   
        return response()->json(null,400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentarioss  $comentarioss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarioss $comentarioss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentarioss  $comentarioss
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarioss $comentarioss)
    {
        //
    }
}
