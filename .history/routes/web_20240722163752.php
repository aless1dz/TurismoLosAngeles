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

//OBTENER FORMULARIO PARA ENVIAR EMAIL Y RECUPERAR CONTRASEÑA
Route::get('/formulario-recuperar-contrasenia', [UserController::class, 'formularioRecuperarContrasenia'])->name('formulario-recuperar-contrasenia');

//ENVIAR EL FORMULARIO PARA RECUPERAR CONTRASEÑA
Route::post('/enviar-recuperar-contrasenia', [UserController::class, 'enviarRecuperarContrasenia'])->name('enviar-recuperacion');

//OBTENER FORMULARIO PARA ACTUALIZAR CONTRASEÑA
Route::get('/reiniciar-contrasenia/{token}', [UserController::class, 'formularioActualizacion'])->name('formulario-actualizar-contrasenia');

//ENVIAR EL FORMULARIO PARA ACTUALIZAR CONTRASEÑA
Route::post('/actualizar-contrasenia', [UserController::class, 'actualizarContrasenia'])->name('actualizar-contrasenia');

//ENVIAR CORREO DE BIENVENIDA
Route::post('/registro', [UserController::class, 'registrar'])->name('registro');
