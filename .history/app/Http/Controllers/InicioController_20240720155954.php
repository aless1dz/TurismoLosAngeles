<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function inicioTurismoLosAngeles(){
        return view('inicio-turismo-los-angeles');
    }
    
}
