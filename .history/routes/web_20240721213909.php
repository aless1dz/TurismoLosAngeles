<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
     return view('inicio-turismo-los-angeles');
});

//INICIO
Route::get('/inicio', [UserController::class, 'inicioTurismoLosAngeles']);

//LOGIN
Route::get('/iniciar-sesion', [UserController::class, 'vistaLogin']);
Route::post('/inicio-sesion', [UserController::class, 'logear']);

//CERRAR SESION
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//REGISTRO
Route::get('/registrarse', [UserController::class, 'vistaRegistro']);
Route::post('/registro', [UserController::class, 'registrar']);


Route::get('password/request', [UserController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [UserController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [UserController::class, 'reset'])->name('password.update');