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
        return view('inicioSesionTurismoLosAngeles');
    }

    public function logear(Request $request)
    {
        $request->validate([
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed'
        ],[
            'email.required'=>'El email es requerido',
            'password.required'=>'La contraseña es requerida',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/inicio');
        }

        return back()->withErrors(['invalid_credentials' => 'Las credenciales no coinciden con nuestros registros.'])
                     ->withInput();
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
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'password_confirmation'=> 'required|same:password'
        ],[
            'email.required'=>'El email es requerido',
            'email.unique'=>'El email ya ha sido utilizado',
            'name.required'=>'El nombre es requerido',
            'password.required'=>'La contraseña es requerida',
            'password_confirmation.required'=>'Es necesario confirmar contraseña'

        ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    

        return redirect('/login');
    }
}
