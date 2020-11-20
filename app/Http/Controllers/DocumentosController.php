<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\File;
use app\Mail\SendEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\User;
use Illuminate\Support\Facades\Hash;

class DocumentosController extends Controller
{

    public function GuardatArchivo(Request $request)
    {
        //$extension=$request->file('file')->extension();
        //$Archivo=Storage::putFileAs('DocumentosPublicos/ArchivosGuardados','$request->file,$request->nombre.".".$extension');
        $Archivo=Storage::disk('public')->put('DocumentosPublicos/ArchivosGuardados', $request->file);
        return response()->json(["ArchivosSubido"=>$Archivo],200);
    }

    public function GuardatArchivoPriv(Request $request)
    {
        //$Archivo=Storage::disk('local')->put('DocumentosPrivados/ArchivosGuardados', $request->Documento);
        $path = Storage::putFileAs('DocumentosPrivados/ArchivosGuardados', $request->file('file'), $request->user()->id.".jpg");
        
        return response()->json(["ArchivosSubido"=>$path],200);
    }

    public function DescargarArchivo($archivo=null)
    {
        if($archivo)
        return Storage::download('DocumentosPrivados/ArchivosGuardados{{$archivo}}');
    }
    
}
