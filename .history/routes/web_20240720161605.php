<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/inicio', [UserController::class, 'inicioTurismoLosAngeles']);
Route::get('/iniciar-sesion', [UserController::class, 'vistaLogin']);

Route::get('/registrarse', [UserController::class, 'vistaRegistro']);
Route::post('/registro', [UserController::class, 'registrar']);

//Route::get('/logear-turismo-los-angeles', [UserController::class, 'vistaLogin']);
// Route::post('/registrar-turismo-los-angeles', [UserController::class, 'registrar']);
