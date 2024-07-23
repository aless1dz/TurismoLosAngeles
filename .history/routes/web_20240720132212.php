<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CorreoController;

use Illuminate\Http\Request;

Route::get('/', function () {
     return view('inicio-turismo-los-angeles');
 });

//INICIO
Route::get('/inicio', [InicioController::class, 'inicioTurismoLosAngeles']);

//LOGIN
Route::get('/login', [UserController::class, 'vistaLogin']);
Route::post('/login', [UserController::class, 'logear']);

//REGISTRARSE


//CERRAR SESION
Route::get('/logout', [UserController::class, 'logout']);
