<?php

namespace App\Http\Middleware;

use Closure;

class IdPersonaje
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
        if ($request->id != null)
        {
            return $next($request);
         }
        return abort(200,'Debes ingresar el Id de un personaje');
    }
}
