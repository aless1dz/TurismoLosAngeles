<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssociatesController;
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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/inicio-turismo-los-angeles');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

