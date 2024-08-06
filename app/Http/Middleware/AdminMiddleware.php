<!-- <?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class AdminMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         if (!Auth::check()) {
//             // Usuario no autenticado
//             return redirect('/iniciar-sesion');
//         }

//         $user = Auth::user();

//         if (!auth()->check() || auth()->user()->role !== 'admin') {
//             // Si el usuario no es admin, redirigir a una página de acceso denegado o página principal
//             return redirect('/inicio'); // o una página de "acceso denegado"
//         }

//         // Si el usuario es admin, continuar con la solicitud
//         return $next($request);
//     }
// } -->
