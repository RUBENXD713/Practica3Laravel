<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPersona(Request $request)
    {
        $persona=new Personas;
        $persona->Nombre=$request->Nombre;
        $persona->save();
        return '¡Persona Guardada!';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Relacion(Request $Nombre)
    {
       
        $personas=DB::table('personas')
        ->join('comentarios','comentarios.Persona','=','personas.id')
        ->Where('personas.Nombre','=',$Nombre->usuario)
        ->select('comentarios.Contenido','personas.nombre')
        ->get();
        return ($personas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Delete(Request $request)
    {
        $personas=DB::table('personas')
        ->where('personas.id','=',$request->id)
        ->delete();
        return 'Eliminacion Exitosa!!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function UpdatePersona(Request $request,$id)
    {    
        $persona=Personas::find ($id);  
        $persona->Nombre=$request->Nombre;
        
        if($persona->save())
        {
            return response()->json(["Usuario actualizado"=>$persona]);   
        }
        return response()->json(null,400); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function getPersonas()
    {
        $persona=Personas::all();
        return response()
        ->json($persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function RelacionTotal(Request $request)
    {
        $personas=DB::table('personas')
        ->join('comentarios','comentarios.Persona','=','personas.id')
        ->join('productos','comentarios.productos','=','productos.id')
        ->Where('personas.Nombre','=',$request->usuario)
        ->select('productos.Nombre','comentarios.Contenido','personas.nombre')
        ->get();
        return ($personas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $personas)
    {
        //
    }
}
