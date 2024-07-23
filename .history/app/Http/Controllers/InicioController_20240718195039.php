<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //Vista de inicio
    public function inicioTurismoLosAngeles(){
        return view('inicioTurismoLosAngeles');
    }

    public function inicioSesionTurismoLosAngeles(){
        return view('inicioSesionTurismoLosAngeles');
    }

    public function logear(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials))
        {
            return redirect()->intended('/inicio-turismo-los-angeles');
        }
        else
        {
            return back()->withErrors([
                'email'=> 'Correo o contraseña incorrectos',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/inicio-sesion-turismo-los-angeles');
    }

    public function Registrar(Request $request)
    {
        

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return redirect('/inicio-sesion-turismo-los-angeles');
    }
}
