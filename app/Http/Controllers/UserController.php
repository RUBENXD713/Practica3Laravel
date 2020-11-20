<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\User;
use Illuminate\Support\Facades\Hash;
use Log;
use App\Mail\validarCorreo;
use App\Mail\correoPermisos;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LogIn(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user=User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email|password'=>['Datos Incorrectos']
            ]);
        }
        if($user->TipoUsuario == 'admin')
        {
            $token=$user->createToken($request->email, ['admin:admin'])->plainTextToken;
            return response()->json(["token"=>$token],201);
        }
        else
        {
            if($user->TipoUsuario == 'user2' )
            {
                $token=$user->createToken($request->email, ['user:user'])->plainTextToken;
                return response()->json(["token"=>$token],201);
            }
            else
            {
                $token=$user->createToken ($request->email,['user:info'])->plainTextToken;
                return response()->json(["token"=>$token],201);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LogOut(Request $request)
    {
        //return response()->json(["Destroyed"=>$request->user()->token()->delete()],200);
        return response()->json(["destroyed" => $request->user()->tokens()->delete()],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Registro(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required',
            'persona'=>'required'
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->TipoUsuario='user';
        $user->persona=$request->persona;
        $user->validacion='no';
        //$u2=$user;
        if($user->save()){
            $retorno=Mail::to($user->email)->send(new validarCorreo($user));
            return response()->json($user);
        }
        return abort(402, "Error al Insertar");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentarioss  $comentarioss
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //Log::info("Construct",$request->name);
        if($request->user()->tokenCan('user:user'))
        {
            return response()->json(['Perfil'=>$request->user()],200);
        }
        if($request->user()->tokenCan('admin:admin'))
        {
            return response()->json(['Usuarios'=>User::all()],200);
        }     
        $user = new User();
        $user=$request->user();
        $user->permiso='user2';
  
        $respuesta=Mail::to('hernandezdiazruben@gmail.com')->send(new correoPermisos($user));
        
        return abort(200,"Tus permisos no son validos");
    }
    public function actualizar(Request $request)
    {
        $user=User::find ($request->id);  
        $user->TipoUsuario=$request->tipo;  
        if($user->save()){
        return response()->json(["Permiso Actualizado a"=>$user]);
        }
        return response()->json("Algo salio mal",400);  
    }
}
