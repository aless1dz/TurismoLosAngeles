<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio-turismo-los-angeles', [InicioController::class, 'inicioTurismoLosAngeles']);
Route::get('/inicio-sesion-turismo-los-angeles', [InicioController::class, 'inicioSesionTurismoLosAngeles']);
Route::post('/inicio-sesion-turismo-los-angeles', [UsuariosController::class, 'logear']);
Route::post('/registro', [UsuariosController::class, 'registrar']);
Route::get('/logout', [UsuariosController::class, 'logout']);
