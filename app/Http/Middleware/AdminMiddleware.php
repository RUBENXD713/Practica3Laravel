<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use App\User;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $db=User::where('email',$request->email)->first();
        if($db->TipoUsuario=='admin')
        {
            return $next($request);
        }
        return abort(400,'No tienes permiso de hacer eso, ya que no eres administrador');
    }
}
