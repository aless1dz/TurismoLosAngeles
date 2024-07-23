<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

//INICIO
Route::get('/inicio', [UserController::class, 'inicioTurismoLosAngeles']);

//LOGIN
Route::get('/iniciar-sesion', [UserController::class, 'vistaLogin']);

//REGISTRO
Route::get('/registrar', [UserController::class, 'vistaRegistro']);
Route::post('/registro', [UserController::class, 'registrar']);

//Route::get('/logear-turismo-los-angeles', [UserController::class, 'vistaLogin']);
// Route::post('/registrar-turismo-los-angeles', [UserController::class, 'registrar']);
