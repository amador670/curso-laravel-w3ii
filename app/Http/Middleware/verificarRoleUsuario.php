<?php

namespace App\Http\Middleware;

use Closure;

class verificarRoleUsuario
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

        //Esto permite devolver un array con todos los parametros de la funcion en la que estamos para poder añadir varios roles (admin, moderador, etc) al controlador
        $roles = func_get_args();

        //Esto permite quitar parametros de un array, en este caso los dos primeros de la funcion en la que estamos (handle) que seria ($request, y Clousure $next) que son añadidos mediante "func_get_args()"
        $roles = array_slice($roles, 2);

        //Si hay un usuario autenticado que tenga el role especificado lo dejamos continuar
        if (auth()->user()->hasRoles($roles)) {
            return $next($request);
        }

        return redirect("/");
    }
}
