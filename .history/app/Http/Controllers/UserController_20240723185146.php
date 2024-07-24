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
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8|same:password'
        ]);

        $confirmation_code = Str::random(30);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmation_code' => $confirmation_code
        ]);

        // Enviar el correo de confirmación
        $this->enviarCorreoConfirmacion($user->email, $confirmation_code);

        return redirect('/iniciar-sesion')->with('message', 'Registro exitoso. Te hemos enviado un correo de confirmación.');
    }

    public function enviarCorreoConfirmacion($destinatario, $codigo)
    {
        $detalles = [
            'titulo' => 'Confirmación de Correo Electrónico',
            'cuerpo' => 'Por favor, haz clic en el siguiente enlace para confirmar tu correo electrónico: ' . url('/confirmar-correo/' . $codigo)
        ];

        Mail::html(
            '<h1>' . $detalles['titulo'] . '</h1>' .
            '<p>' . $detalles['cuerpo'] . '</p>',
            function ($message) use ($destinatario) {
                $message->to($destinatario)
                        ->subject('Confirmación de Correo Electrónico');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            }
        );
    }

    public function confirmarCorreo($codigo)
    {
        $user = User::where('confirmation_code', $codigo)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Código de confirmación inválido.');
        }

        $user->email_verified_at = now();
        $user->confirmation_code = null;
        $user->save();

        // Enviar correo de bienvenida
        $this->enviarCorreoBienvenida($user->email);

        return redirect('/iniciar-sesion')->with('message', 'Correo electrónico confirmado exitosamente.');
    }

    public function enviarCorreoBienvenida($destinatario)
    {
        $detalles = [
            'titulo' => 'Bienvenido al Maravilloso Mundo de la Programación',
            'cuerpo' => 'Hola, este es un correo de bienvenida. Gracias por registrarte.'
        ];

        Mail::html(
            '<h1>' . $detalles['titulo'] . '</h1>' .
            '<p>' . $detalles['cuerpo'] . '</p>',
            function ($message) use ($destinatario) {
                $message->to($destinatario)
                        ->subject('Bienvenido');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            }
        );
    }

}