<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class EmailController extends Controller
{
    public function ActualizarPermisos($id)
    {
        $aux=User::find($id);
        $aux->validacion='si';
        if($aux->save())
        {
            return response(["Tus Permisos ".$aux->validacion." Fueron Validados"]);   
        }
        return response()->json("ERROR",400);
    }
}
