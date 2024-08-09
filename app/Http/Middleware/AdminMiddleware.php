<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Usuario no autenticado
            return redirect('/iniciar-sesion');
        }

        $user = Auth::user();

        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'employee'])) {
            // Redirige si el usuario no tiene el rol adecuado
            return redirect('/inicio'); // o una página de "acceso denegado"
        }

        // Si el usuario es admin, continuar con la solicitud
        return $next($request);
    }
}
