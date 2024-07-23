<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('inicio-turismo-los-angeles');
});

Route::get('/inicio-turismo-los-angeles', [InicioController::class, 'inicioTurismoLosAngeles']);

Route::get('/inicio-sesion-turismo-los-angeles', [InicioController::class, 'inicioSesionTurismoLosAngeles']);
Route::post('/login', [InicioController::class, 'logear']);
Route::post('/registro', [InicioController::class, 'registrar']);
Route::get('/logout', [InicioController::class, 'logout']);
