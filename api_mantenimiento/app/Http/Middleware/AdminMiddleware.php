<?php

namespace App\Http\Middleware;

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
        // Comprueba si es administrador, si lo es, deja pasar la peticion
        if (auth()->check() && auth()->user()->isAdmin)
            return $next($request);

            //Si no, redirige a la apgina principal
        return redirect('/');
    }
}