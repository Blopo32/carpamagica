<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\UltimosController;
use App\Http\Controllers\VinietasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;

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
Route::get('/ultimos', [UltimosController::class, 'show']);
Route::get('/ultimos/{page}', [UltimosController::class, 'showPagination']);
