<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio-turismo-los-angeles', [InicioController::class, 'inicioTurismoLosAngeles']);
Route::get('/inicio-sesion-turismo-los-angeles', [InicioController::class, 'inicioSesionTurismoLosAngeles']);