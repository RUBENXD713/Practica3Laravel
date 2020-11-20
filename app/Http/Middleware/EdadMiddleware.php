<?php

namespace App\Http\Middleware;

use Closure;

class EdadMiddleware
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
        if ($request->edad > 17)
        {
            return $next($request);
        }
        return abort(400,'La Edad no es Valida');
    }
}
