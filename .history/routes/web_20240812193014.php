<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\Cost_TabulatorsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormalityController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
     return view('auth.inicio-turismo-los-angeles');
});

//INICIO
Route::get('/inicio', [UserController::class, 'inicioTurismoLosAngeles']);

//LOGIN
Route::get('/iniciar-sesion', [UserController::class, 'vistaLogin'])->name('login');
Route::post('/inicio-sesion', [UserController::class, 'logear']);

//CERRAR SESION
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//REGISTRO
Route::get('/registrarse', [UserController::class, 'vistaRegistro']);
Route::post('/registro', [UserController::class, 'registrar']);
Route::get('/vista-verificacion', [UserController::class, 'registrar']);


Route::get('/citas', [UserController::class, 'citasTurismoLosAngeles']);

Route::get('/servicios', [UserController::class, 'serviciosTurismoLosAngeles']);

Route::get('/visa', [UserController::class, 'visaTurismoLosAngeles']);

Route::get('/pasaporte', [UserController::class, 'pasaporteTurismoLosAngeles']);

Route::get('/unidades', [UserController::class, 'unidadesTurismoLosAngeles']);

Route::get('/viajes', [UserController::class, 'viajesTurismoLosAngeles']);

Route::get('/viajesUsa', [UserController::class, 'viajesUsaTurismoLosAngeles']);

Route::get('/viajesVacacionales', [UserController::class, 'viajesVacacionalesTurismoLosAngeles']);

Route::get('/viajesLocales', [UserController::class, 'viajesLocalesTurismoLosAngeles']);

Route::get('/citasPrincipal', [UserController::class, 'citasPrincipalTurismoLosAngeles']);

Route::get('/citasVisa', [UserController::class, 'citasVisaTurismoLosAngeles']);

Route::get('/citasViajes', [UserController::class, 'citasViajesTurismoLosAngeles']);

Route::get('/citasUnidades', [UserController::class, 'citasUnidadesTurismoLosAngeles']);

Route::get('/citasCotizacion', [UserController::class, 'citasCotizacionTurismoLosAngeles']);

Route::get('/citaPasaporte', [UserController::class, 'citaPasaporteTurismoLosAngeles']);


//ENVIAR CORREO DE VERIFICACION EMAIL
Route::get('/verificar-email/{token}', [UserController::class, 'verificarEmail'])->name('verification.verify');


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

// Route::group(['middleware' => ['check.role:admin']], function () {
//      // Rutas accesibles solo para administradores
//      Route::get('/dashboard', function(){
//           return view('adminFold.dashboard');
//       });
//       Route::get('/view/cities', funct..ion () {
//           return view('adminFold.cities');
//       });
//  }); 

Route::middleware(['auth', 'admin'])->group(function () {
     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
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

Route::get('/states', [StatesController::class, 'view'])->name('states');
Route::get('/get/states', [StatesController::class, 'getStates']);
Route::get('/get/state/{id}', [StatesController::class, 'getState']);
Route::post('/insert/state', [StatesController::class, 'insertState']);
Route::put('/update/state/{id}', [StatesController::class, 'updateState']);
Route::delete('/delete/state/{id}', [StatesController::class, 'deleteState']);


Route::get('/view/cities', [CitiesController::class, 'view'])->name('cities');
Route::get('/cities/all', [CitiesController::class, 'getCities']);
Route::get('/cities/{id}', [CitiesController::class, 'getCity']);
Route::post('/cities/insert', [CitiesController::class, 'insertCity']);
Route::put('/cities/update/{id}', [CitiesController::class, 'updateCity']);
Route::delete('/cities/delete/{id}', [CitiesController::class, 'deleteCity']);
Route::get('/states/all', [CitiesController::class, 'getStates']);


Route::get('/view/destinations', [DestinationsController::class, 'view'])->name('destinations');
Route::get('/get/destinations', [DestinationsController::class, 'getDestinations']);
Route::get('/get/destination/{id}', [DestinationsController::class, 'getDestination']);
Route::post('/insert/destination', [DestinationsController::class, 'insertDestination']);
Route::put('/update/destination/{id}', [DestinationsController::class, 'updateDestination']);
Route::delete('/delete/destination/{id}', [DestinationsController::class, 'deleteDestination']);
Route::get('/get/states', [DestinationsController::class, 'getStates']);
Route::get('/get/cities', [DestinationsController::class, 'getCities']);

Route::get('/view/cost_tabulators', [Cost_TabulatorsController::class, 'view'])->name('cost_tabulators');
Route::get('/cost_tabulators/all', [Cost_TabulatorsController::class, 'getCost_Tabulators']);
Route::get('/cost_tabulators/{idcost_tabulators}', [Cost_TabulatorsController::class, 'getCost_Tabulator']);
Route::post('/cost_tabulators/insert', [Cost_TabulatorsController::class, 'insertCost_Tabulator']);
Route::put('/cost_tabulators/update/{idcost_tabulators}', [Cost_TabulatorsController::class, 'updateCost_Tabulator']);
Route::delete('/cost_tabulators/delete/{idcost_tabulators}', [Cost_TabulatorsController::class, 'deleteCost_Tabulator']);
Route::get('/destinations/all', [Cost_TabulatorsController::class, 'getDestinations']);
// Route::middleware(['admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });

Route::get('/view/units', [UnitsController::class, 'view'])->name('units');
Route::get('/get/units', [UnitsController::class, 'getUnits']);
Route::get('/get/unit/{idunits}', [UnitsController::class, 'getUnit']);
Route::post('/units/insert', [UnitsController::class, 'insertUnit']);
Route::put('/units/update/{idunits}', [UnitsController::class, 'updateUnit']);
Route::delete('/delete/unit/{idunits}', [UnitsController::class, 'deleteUnit']);

Route::get('/view/trips', [TripsController::class, 'view'])->name('trips');
Route::get('/get/trips', [TripsController::class, 'getTrips']);
Route::get('/get/trip/{idtrips}', [TripsController::class, 'getTrip']);
Route::post('/trips/insert', [TripsController::class, 'insertTrip']);
Route::put('/trips/update/{idtrips}', [TripsController::class, 'updateTrip']);
Route::delete('/delete/trip/{idtrips}', [TripsController::class, 'deleteTrip']);

Route::get('/get/trip/{id}', [TripsController::class, 'getTrip']);
Route::post('/trips/insert', [TripsController::class, 'insertTrip']);
Route::put('/trips/update/{id}', [TripsController::class, 'updateTrip']);
Route::delete('/delete/trip/{id}', [TripsController::class, 'deleteTrip']);
Route::get('/destinations/all', [TripsController::class, 'getDestinations']);
Route::get('/users/all', [TripsController::class, 'getUsers']);
Route::get('/cost_tabulators/all', [TripsController::class, 'getCost_Tabulators']);


Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::post('/admin/users', [UserController::class, 'store']);
Route::put('/admin/users/{id}', [UserController::class, 'update']);
Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);


 });

 Route::prefix('users')->group(function () {
     Route::get('/', [UserController::class, 'index'])->name('users.index');
     Route::post('/', [UserController::class, 'store'])->name('users.store');
     Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
     Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
 });
 Route::post('/formulario', [FormalityController::class, 'insertPasaporte'])->name('store.formality');
 Route::get('/pasaportes', [FormalityController::class, 'viewPasaportes'])->name('pasaportes');
 
 Route::get('/cotizaciones', [FormalityController::class, 'viewCotizaciones'])->name('cotizaciones');
 Route::post('/insertCotizacion', [FormalityController::class, 'insertCotizacion'])->name('store.cotizacion');
 
 Route::get('/comentarios', [FormalityController::class, 'viewComentarios'])->name('comentarios');
 Route::post('/insertComentario', [FormalityController::class, 'insertComentarios'])->name('store.comentario');
 
 Route::get('/rentas', [FormalityController::class, 'viewRentas'])->name('rentas');
 Route::post('/store-renta', [FormalityController::class, 'insertRentas'])->name('insertar.renta');
 
 Route::get('/viajesForm', [FormalityController::class, 'viewViajes'])->name('viajes');
 
 Route::post('/store-viajes', [FormalityController::class, 'insertViajes'])->name('store.viajes');
 
 Route::get('/visas', [FormalityController::class, 'viewVisas'])->name('visas');
 
 Route::post('/store-visas', [FormalityController::class, 'insertVisas'])->name('store.visas');
 
 Route::get('get-cities-by-state/{id}', [CitiesController::class, 'getCitiesByState']);
 
 Route::get('/formalities', [FormalityController::class, 'index'])->name('citas');
 

