<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Client\Response;

class HttpClienteController extends Controller
{
    //Obtiene listas de cómics
    public function conexion(Request $request)
    {
        /*$request->key;
        $url="http://gateway.marvel.com/v1/public/comics?ts=1&apikey=7d698dd14d31a76a84440f7fcbd210dd&hash=fbde631c538fc22a0ea5170733c98e83";
*/
        $response = Http::timeout(1)->get('http://gateway.marvel.com/v1/public/comics',[
            "apikey"=>"7d698dd14d31a76a84440f7fcbd210dd",
            "ts"=>"1",
            "hash"=>"fbde631c538fc22a0ea5170733c98e83"
        ]);
        //$response=Http::get($url);
        if($response->ok())
        {
            return response()->json($response->json(),$response->status());
        }
        return response()->json($response->body(),$response->status());
    }

    //Este método obtiene un recurso de un solo personaje
    public function personaje(Request $request)
    {
        if($request->id!=null)
        {
            $personaje='/'.$request->input('id');
        }
        else
        {
        $personaje=$request->input('id',null);
        }
        $url="http://gateway.marvel.com/v1/public/characters{$personaje}?ts=1&apikey=7d698dd14d31a76a84440f7fcbd210dd&hash=fbde631c538fc22a0ea5170733c98e83";

        $response = Http::retry(3, 100)->get($url);
        if($response->ok())
        {
            return response()->json($response->json(),$response->status());
        }
        return response()->json($response->body(),$response->status());
    }

    //Obtiene listas de series de cómics en las que aparece un personaje específico

    public function SeriesPersonaje(Request $request)
    {
        $personaje="/".$request->id;
        $url="http://gateway.marvel.com/v1/public/characters{$personaje}?ts=1&apikey=7d698dd14d31a76a84440f7fcbd210dd&hash=fbde631c538fc22a0ea5170733c98e83";

        $response=Http::get($url);
        if($response->ok())
        {
            return response()->json($response->json(),$response->status());
        }
        return response()->json($response->body(),$response->status());
    }
}
