<?php

namespace App\Http\Controllers;

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

    //Vista de login
    public function logear(Request $request)
    {
        $credentials = request->only('email','password');

        if(Auth::attempt($credentials))
        {
            return redirect()->intended('/inicioTurismoLosAngeles');

        }
        else
        {
            return back()->withErrors([
                'email'=>'Credenciales incorrectas',
            ]);
        }
    }
}
