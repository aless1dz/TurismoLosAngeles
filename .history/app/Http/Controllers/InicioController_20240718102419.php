<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //Vista de inicio
    public function inicioTurismoLosAngeles(){
        return view('inicioTurismoLosAngeles');
    }
}
