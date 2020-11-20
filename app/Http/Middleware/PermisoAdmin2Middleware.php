<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Log;
use App\Mail\validarCorreo;
use App\Mail\correoPermisos;
use App\Mail\correoPermisosPU;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;

class PermisoAdmin2Middleware
{
    use Notifiable, HasApiTokens;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if($request->user()->tokenCan('user:user') || $request->user()->tokenCan('admin:admin'))
        {
            return $next($request);
        }
        $user=$request->user();
        $user->permiso='user2';
        Mail::to('hernandezdiazruben@gmail.com')->send(new correoPermisos($user));
        Mail::to($user->email)->send(new correoPermisosPU());
        return abort(200,"Tus permisos no son lo suficientes para realizar esta accion");
        
    }
}
