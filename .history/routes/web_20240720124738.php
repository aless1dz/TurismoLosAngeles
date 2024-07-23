<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CorreoController;

use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/inicio', [InicioController::class, 'inicioTurismoLosAngeles']);
Route::get('/logear-turismo-los-angeles', [UserController::class, 'vistaLogin']);
Route::post('/logear-turismo-los-angeles', [UserController::class, 'logear']);
Route::post('/registrar-turismo-los-angeles', [UserController::class, 'registrar']);
Route::get('/logout', [UserController::class, 'logout']);
