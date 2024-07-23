<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CorreoController;

use Illuminate\Http\Request;

Route::get('/', function () {
     return view('inicioTurismoLosAngeles');
 });

Route::get('/inicio', [InicioController::class, 'inicioTurismoLosAngeles']);
Route::get('/login', [UserController::class, 'vistaLogin']);
Route::post('/login', [UserController::class, 'logear']);
Route::post('/registrar', [UserController::class, 'registrar']);
Route::get('/logout', [UserController::class, 'logout']);
