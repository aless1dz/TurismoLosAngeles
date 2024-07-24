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

Route::post('/register', [UserController::class, 'registrar'])->name('register');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // Enviar correo de bienvenida después de la verificación
    $user = $request->user();
    $controller = app(UserController::class);
    $controller->enviarCorreo($user->email);

    return redirect('/home')->with('message', 'Tu correo ha sido verificado. ¡Bienvenido!');
})->middleware(['auth', 'signed'])->name('verification.verify');

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

Route::get('/dashboard', function(){
    return view('adminFold.dashboard');
});

Route::get('/view/associates',[AssociatesController::class, "view"])->name('associates');
Route::get('/get/associates', [AssociatesController::class, "index"]);
Route::get('/get/associate/{id}',[AssociatesController::class, "show"]);
Route::post('/insert/associate',[AssociatesController::class, "store"]);
Route::put('/update/associate/{id}',[AssociatesController::class, "update"]);
Route::delete('/delete/associate/{id}',[AssociatesController::class, "destroy"]);