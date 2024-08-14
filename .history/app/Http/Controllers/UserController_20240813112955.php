<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\RegistroConfirmacion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
       if (auth()->user()->role !== 'admin') {
            abort(2, 'No tienes permiso para acceder a esta página.');
        }
        $users = User::whereIn('role', ['admin', 'employee'])->get();
    return view('adminFold/adminUsers', compact('users'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate'=>'required|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json($user);
    }

    public function destroy($id)
{
    $user = User::find($id);
    if ($user) {
        $user->delete();
        return response()->json(['success' => 'Usuario eliminado']);
    }

    return response()->json(['error' => 'Usuario no encontrado'], 404);
}

    

    public function vistaLogin(){
        if (Auth::check()) {
            // Si el usuario está autenticado, redirigir a /inicio
            return redirect('/inicio');
        }
        
        // Si el usuario no está autenticado, podrías redirigir a otra página o mostrar un mensaje
        return view('auth.iniciarSesionTurismoLosAngeles');
       // return redirect('login');
    }

    public function vistaRegistro(){
        return view('auth.registrarseTurismoLosAngeles');
    }

    public function inicioTurismoLosAngeles(){
        return view('auth.inicio-turismo-los-angeles');
    }

    public function citasTurismoLosAngeles(){
        return view('auth.citasTurismoLosAngeles');
    }

    public function serviciosTurismoLosAngeles(){
        return view('auth.serviciosTurismoLosAngeles');
    }

    public function visaTurismoLosAngeles(){
        return view('auth.visaTurismoLosAngeles');
    }

    public function pasaporteTurismoLosAngeles(){
        return view('auth.pasaporteTurismoLosAngeles');
    }

    public function unidadesTurismoLosAngeles(){
        return view('auth.unidadesTurismoLosAngeles');
    }

    public function viajesTurismoLosAngeles(){
        return view('auth.viajesTurismoLosAngeles');
    }

    public function viajesUsaTurismoLosAngeles(){
        return view('auth.viajesUsaTurismoLosAngeles');
    }

    public function viajesVacacionalesTurismoLosAngeles(){
        return view('auth.viajesVacacionalesTurismoLosAngeles');
    }

    public function viajesLocalesTurismoLosAngeles(){
        return view('auth.viajesLocalesTurismoLosAngeles');
    }

    public function citasPrincipalTurismoLosAngeles(){
        return view('auth.citasPrincipalTurismoLosAngeles');
    }

    public function citasVisaTurismoLosAngeles(){
        return view('auth.citasVisaTurismoLosAngeles');
    }

    public function citasViajesTurismoLosAngeles(){
        return view('auth.citasViajesTurismoLosAngeles');
    }

    public function citasUnidadesTurismoLosAngeles(){
        return view('auth.citasUnidadesTurismoLosAngeles');
    }

    public function citasCotizacionTurismoLosAngeles(){
        return view('auth.citasCotizacionTurismoLosAngeles');
    }

    public function citaPasaporteTurismoLosAngeles(){
        return view('auth.citaPasaporteTurismoLosAngeles');
    }

    public function citasClientes(){
        return view('auth.citasClientes');
    }


    public function logear(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ],[
            'email.required' => 'El email es necesario',
            'password.required' => 'La contraseña es necesaria',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Verificar si el correo electrónico está verificado
            if ($user->role !== 'admin' && $user->role !== 'employee' && $user->email_verified_at === null) {
                Auth::logout();
                return redirect()->back()->with('error', 'Por favor, verifica tu correo electrónico antes de iniciar sesión.');
            }

            // Redirigir según el rol del usuario
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/dashboard'); // Ruta para admin
                case 'employee':
                    return redirect()->intended('/dashboard'); // Ruta para empleado
                case 'user':
                    return redirect()->intended('/inicio'); // Ruta para usuarios
                default:
                    return redirect()->intended('/inicio'); // Ruta predeterminada
            }
        }

        return redirect()->back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/inicio');
    }

    public function registrar(Request $request)
    {
        $request->validate([
             'name' => 'required|string|max:255',
             'last_name'=>'required|string|max:255',
             'birthdate'=>'required|date',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',

        ],[
            'name.required'=>'El nombre es necesario',
            'last_name.required'=>'El apellido es necesario',
            'birthdate.required'=>'La fecha de nacimiento es necesaria',
            'birthdate.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'email.required'=>'El email es necesario',
            'email.unique'=>'El email ya es utilizado',
            'password.required'=>'La contraseña es necesaria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',

        ]
        );

        $verificationToken = Str::random(60);

        $user = User::create([
            'name' => $request->name,
            'last_name'=> $request->last_name,
            'birthdate'=> $request->birthdate,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => null,
            'verification_token' => $verificationToken,
        ]);

        $this->enviarCorreoVerificacion($user->email, $verificationToken);

        return view('emails.vistaVerificacion')->with('email', $user->email);

    }

    //VERIFICAR EMAIL DE USUARIO
    private function enviarCorreoVerificacion($email, $token)
    {
        $verificationLink = url('/verificar-email/' . $token);

        Mail::send('emails.verificacion', ['verificationLink' => $verificationLink], function ($message) use ($email) {
        $message->to($email)->subject('Verifica tu dirección de correo electrónico');
        });
    }

    public function verificarEmail($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/iniciar-sesion')->with('error', 'Token de verificación inválido.');
        }

        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        $this->enviarCorreoBienvenida($user);

        return redirect('/iniciar-sesion')->with('message', 'Tu cuenta ha sido verificada. Ahora puedes iniciar sesión.');
    }

    
    private function enviarCorreoBienvenida($user)
    {
        if (!$user instanceof User) {
        return;
        }
    
        try {
        Mail::to($user->email)->send(new VerifyEmail($user));
        } catch (\Exception $e) {
       
        }
    }

    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->email_verified_at) {
            Auth::logout();
            return redirect('/iniciar-sesion')->with('error', 'Por favor, verifica tu correo electrónico antes de iniciar sesión.');
        }

        return $next($request);
    }

     //RECUPERAR CONTRASEÑA
     public function formularioRecuperarContrasenia()
     {
         return view('auth.formulario-recuperar-contrasenia');
     }
 
     public function enviarRecuperarContrasenia(Request $request)
     {
         // Validación del email
         $request->validate([
             'email' => 'required|email|exists:users',
         ],[
            'email.required'=>'El email es necesario',
            'email.email' => 'El formato del email es inválido.',
            'email.exists' => 'El email no está registrado.',
            'email' => 'El email seleccionado es inválido.',
            ]);
 
         // Generar un token único
         $token = Str::random(64);
 
         // Eliminar la anterior reseteo de contraseña sin terminar
         DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
 
         // Creamos la solicitud de reseteo de contraseña
         DB::table('password_reset_tokens')->insert([
             'email' => $request->email,
             'token' => $token,
             'created_at' => Carbon::now()
         ]);
 
         // Enviamos el email de recuperación de contraseña
         Mail::send('auth.recuperar-contrasenia', ['token' => $token], function ($message) use ($request) {
             $message->to($request->email);
             $message->subject('Recuperar Contraseña');
         });
 
         return back()->with('message', 'Te hemos enviado un email con las instrucciones para que recuperes tu contraseña');
     }
     
     public function formularioActualizacion($token)
     {
         return view('auth.formulario-actualizacion', ['token' => $token]);
     }
 
    
     public function actualizarContrasenia(Request $request)
     {
         // Validaciones
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:8|confirmed',
         ],[
            'email.required'=>'El email es necesario',
            'email.email' => 'El formato del email es inválido.',
            'email.exists' => 'El email no está registrado.',
            'password.required'=>'La contraseña es necesaria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            ]);
 
         // Obtenemos el registro que contiene la solicitud de reseteo de contraseña
         $updatePassword = DB::table('password_reset_tokens')
             ->where([
                 'email' => $request->email,
                 'token' => $request->token
             ])
             ->first();
 
         // Si no existe la solicitud devolvemos un error
         if (!$updatePassword) {
             return back()->withInput()->with('error', 'Token inválido');
         }
 
         // Actualizamos la contraseña del usuario
         $user = User::where('email', $request->email)
             ->update(['password' => Hash::make($request->password)]);
 
 
         // Eliminamos la solicitud
         DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
 
         // Devolvemos al formulario de login (devolvera un 404 puesto que no existe la ruta)
         return redirect('/iniciar-sesion')->with('message', 'Tu contraseña se ha cambiado correctamente');
     }


    public function view(){
        return view('adminFold.clientes');
    }

    public function personal(){
        return view('adminFold.personal');
    }

    public function getUsers(Request $request)
    {
         $order = $request->query('order', 'asc');
        // $users = User::orderBy('id', $order)->get();
        // return response()->json($users);
        $users = User::where('role', 'user')->get();
        return response()->json($users);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    
    public function getAdmins(Request $request)
    {
        $admins = User::where('role', 'admin')->get();
        return response()->json($admins);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->save();
        return response()->json($user);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function checkAuthentication()
    {
        if (Auth::check()) {
            // Si el usuario está autenticado, redirigir a /inicio
            return redirect('/inicio');
        }
        
        // Si el usuario no está autenticado, podrías redirigir a otra página o mostrar un mensaje
        return redirect('login');
    }

}