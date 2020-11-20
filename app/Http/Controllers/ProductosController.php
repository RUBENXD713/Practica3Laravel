<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use App\Mail\ProductoNuevo;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ejemplo(Request $request){
        return response()->json("Ya jalo carnal",200);
    }

    public function getProductos()
    {
        $producto=Productos::all();
        return response()
        ->json($producto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductos(Request $request)
    {
        
        $user=$request->user();
        $produc=new Productos;
        $produc->Nombre=$request->Nombre;
        $produc->persona=1;
        $produc->save();
        Mail::to($user->email)->send(new ProductoNuevo());
        return '¡Producto Guardado!';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Relacion(Request $Nombre)
    {
       
        $products=DB::table('productos')
        ->join('comentarios','comentarios.productos','=','productos.id')
        ->where('productos.nombre','=',$Nombre->Nombre)
        ->select('productos.Nombre','comentarios.Contenido')
        ->get();
        return ($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function Delete(Request $request)
    {
        $products=DB::table('productos')
        ->where('productos.id','=',$request->id)
        ->delete();
        return 'Eliminacion Exitosa!!';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request,$id)
    {    
        $producto=Productos::find ($id);  
        $producto->Nombre=$request->Nombre;
   
        if($producto->save())
        return response()->json(["Registro actualizado"=>$producto]);   
        return response()->json(null,400); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }
}
