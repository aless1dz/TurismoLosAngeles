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
Route::get('/iniciar-sesion', [UserController::class, 'logearTurismoLosAngeles']);

Route::get('/registrarse', [UserController::class, 'vistaRegistro']);
Route::post('/registrarse', [UserController::class, 'registrar']);

//Route::get('/logear-turismo-los-angeles', [UserController::class, 'vistaLogin']);
// Route::post('/registrar-turismo-los-angeles', [UserController::class, 'registrar']);

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

