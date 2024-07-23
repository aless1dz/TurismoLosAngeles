<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssociatesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/inicio', [InicioController::class, 'inicioTurismoLosAngeles']);
Route::get('/logear-turismo-los-angeles', [UserController::class, 'vistaLogin']);
Route::post('/logear-turismo-los-angeles', [UserController::class, 'logear']);
Route::post('/registrar-turismo-los-angeles', [UserController::class, 'registrar']);

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/inicio-turismo-los-angeles');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('status', 'verification-link-sent');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/dashboard', function(){
    return view('adminFold.dashboard');
});

Route::get('/view/associates',[AssociatesController::class, "view"])->name('associates');
Route::get('/get/associates', [AssociatesController::class, "index"]);
Route::get('/get/associate/{id}',[AssociatesController::class, "show"]);
Route::post('/insert/associate',[AssociatesController::class, "store"]);
Route::put('/update/associate/{id}',[AssociatesController::class, "update"]);
Route::delete('/delete/associate/{id}',[AssociatesController::class, "destroy"]);