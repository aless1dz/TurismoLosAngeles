<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/vista-verificacion', function () {
     return view('vistaVerificacion');
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
Route::get('/vista-verificacion', [UserController::class, 'registrar']);


//ENVIAR CORREO DE VERIFICACION EMAIL
Route::get('/verificar-email/{token}', [UserController::class, 'verificarEmail'])->name('verification.verify');

//PROTEGER RUTAS SI EL USUARIO NO ESTA AUTENTICADO
/*Route::middleware(['auth', 'verified'])->group(function () {
     Route::get('/inicio', [UserController::class, 'inicioTurismoLosAngeles']);
});*/

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

Route::get('/view/users',[UserController::class, "view"])->name('users');
Route::get('/get/users', [UserController::class, 'getUsers']);
Route::get('/get/user/{id}', [UserController::class, 'getUser']);
Route::post('/insert/user', [UserController::class, 'insertUser']);
Route::put('/update/user/{id}', [UserController::class, 'updateUser']);
Route::delete('/delete/user/{id}', [UserController::class, 'deleteUser']);

Route::get('/view/associates',[AssociatesController::class, "view"])->name('associates');
Route::get('/get/associates', [AssociatesController::class, "index"]);
Route::get('/get/associate/{id}',[AssociatesController::class, "show"]);
Route::post('/insert/associate',[AssociatesController::class, "store"]);
Route::put('/update/associate/{id}',[AssociatesController::class, "update"]);
Route::delete('/delete/associate/{id}',[AssociatesController::class, "destroy"]);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
