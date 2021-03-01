<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlDataController;
use App\Http\Controllers\Session\LoginController;
use App\Http\Controllers\Session\RegistroController;
use App\Http\Controllers\Vinietas\SendVinietaController;
use App\Http\Controllers\Vinietas\ListaVinController;
use App\Http\Controllers\Vinietas\ComentController;
use App\Http\Controllers\Usuarios\PerfilesController;

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


/**
 * Screen INICIO
 */
Route::get('/', function () {
    return view('index');
});


/**
 * Login
 */
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


/**
 * Screen REGISTRO
 */
Route::get('/signUp', [RegistroController::class, 'show']);
Route::post('/signUp/createUser', [RegistroController::class, 'signUp']);


/**
 * Screen ULTIMOS
 */
Route::get('/ultimos', [ListaVinController::class, 'showUltimos']);
Route::get('/ultimos/page/{page}', [ListaVinController::class, 'showUltimosPagination']);


/**
 * Screen MEJORES
 */
Route::get('/mejores', [ListaVinController::class, 'showMejores']);
Route::get('/mejores/page/{page}', [ListaVinController::class, 'showMejoresPagination']);


/**
 * Screen ENVIAR APORTE
 */
Route::get('/enviar', [SendVinietaController::class, 'show']);
Route::get('/enviar/imagen', [SendVinietaController::class, 'showImage']);
Route::get('/enviar/gif', [SendVinietaController::class, 'showGif']);


/**
 * VOTAR
 */
Route::post('/votar', [ControlDataController::class, 'votarAporte']);
Route::post('/ultimos/votar', [ControlDataController::class, 'votarAporte']);


/**
 * PERFILES
 */
// Mi perfil
Route::get('/perfil', [PerfilesController::class, 'miPerfil']);
Route::get('/perfil/{usuario}', [PerfilesController::class, 'mostrarPerfil']);
// Cambiar avatar
Route::get('/perfil/setPerfil/{numPoke}', [PerfilesController::class, 'setPerfil']);




/**
 * Comentarios
 */
// show screen comentarios
Route::get('/cajaComentarios/{vin}', [ComentController::class, 'show']);







/**
 * Control
 * Controladores que realizan gestion dentro de la pagina
 */
Route::post('/control/subirImg', [ControlDataController::class, 'subirImg']);
Route::post('/asd', [ControlDataController::class, 'subirImg']);
