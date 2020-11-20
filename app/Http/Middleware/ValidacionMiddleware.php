<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ValidacionMiddleware
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
        $user=User::where('email',$request->email)->first();
        if($user->validacion=='si')
        {
            return $next($request);
        }
        return abort(400,"Error No has validado tu cuenta, Ingresa a tu correo electronico y valida antes de continuar");
    }
}
