<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\RegistroConfirmacion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function vistaLogin(){
        return view('iniciarSesionTurismoLosAngeles');
    }

    public function vistaRegistro(){
        return view('registrarseTurismoLosAngeles');
    }

    public function inicioTurismoLosAngeles(){
        return view('inicio-turismo-los-angeles');
    }
    public function logear(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/inicio');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/inicio');
    }

    public function registrar(Request $request)
    {
        $request->validate([
             'name' => 'required|string|max:255',
             'lastName'=>'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'password_confirmation' => 'required|string|min:8|some:password'

         ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/iniciar-sesion');
    }
}
