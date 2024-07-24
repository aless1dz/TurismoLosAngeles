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


class UserController extends Controller
{
    public function vistaLogin(){
        return view('Auth.iniciarSesionTurismoLosAngeles');
    }

    public function vistaRegistro(){
        return view('Auth.registrarseTurismoLosAngeles');
    }

    public function inicioTurismoLosAngeles(){
        return view('Auth.inicio-turismo-los-angeles');
    }
    public function logear(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ],[
            'email.required'=>'El email es necesario',
            'password.required'=>'La contraseña es necesaria',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/inicio');
        }

        return back()->withErrors([
            'invalid_credentials' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput();
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
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8',
             'password_confirmation' => 'required|string|min:8|same:password'

        ],[
            'name.required'=>'El nombre es necesario',
            'last_name.required'=>'El apellido es necesario',
            'email.required'=>'El email es necesario',
            'email.unique'=>'El email ya es utilizado',
            'password.required'=>'La contraseña es necesaria',
            'password_confirmation.required'=>'La contraseña no coincide',

        ]
        );

        $user = User::create([
            'name' => $request->name,
            'last_name'=> $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),            
        ]);

        $this->enviarCorreo($user->email);

        return redirect('/iniciar-sesion')->with('message', 'Registro exitoso. Te hemos enviado un correo de bienvenida.');

    }

    public function enviarCorreo($destinatario)
    {
        $detalles = [
            'titulo' => 'Bienvenido a Turismo Los Angeles',
            'cuerpo' => 'Hola, Gracias por registrarte en nuestro sitio web'
        ];

        Mail::html(
            '<h1>' . $detalles['titulo'] . '</h1>' .
            '<p>' . $detalles['cuerpo'] . '</p>',
            function ($message) use ($destinatario) {
                $message->to($destinatario)
                        ->subject('Registro exitoso a Turismo Los Angeles');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            }
        );
        return response()->json(['status' => 'Correo enviado']);
    }

    //RECUPERAR CONTRASEÑA
    public function formularioRecuperarContrasenia()
    {
        return view('Auth.formulario-recuperar-contrasenia');
    }

    public function enviarRecuperarContrasenia(Request $request)
    {
        // Validación del email
        $request->validate([
            'email' => 'required|email|exists:users',
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
        Mail::send('Auth.recuperar-contrasenia', ['token' => $token], function ($message) use ($request) {
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
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
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

}