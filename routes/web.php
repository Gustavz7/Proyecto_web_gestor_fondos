<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DineroPrincipalController;
use App\Http\Controllers\EstadisticasConfigController;
use App\Http\Controllers\fechaController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\ModificacionesMovimientosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/about', 'about');
Route::view('/perfil', 'perfil_usuario');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/**
 * recursos para API
 **/
Route::resource('/dinero_principal', DineroPrincipalController::class);
//return monto movimientos
Route::resource('/estadisticas', EstadisticasConfigController::class);
//return fechas
Route::resource('/fecha_actual', fechaController::class);
//return de movimientos & update
Route::resource('/movimientos', MovimientosController::class);

//return de historial de movimientos
Route::resource('/movimientos_historial', ModificacionesMovimientosController::class);
/**
 * API-REST
 */
//return api data
Route::resource('/api-data', apiController::class);


/**
 * Store & modify
 */
//Recepcion de datos
Route::resource('/add_movimiento', MovimientosController::class);


