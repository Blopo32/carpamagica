<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\UltimosController;
use App\Http\Controllers\VinietasController;

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
    return view('index');
});



/**
 * Screen ULTIMOS
 */
Route::get('/ultimos', [UltimosController::class, 'show']);
Route::get('/ultimos/{page}', [UltimosController::class, 'showPagination']);


Route::get('/pruebaBD', [VinietasController::class, 'show']);
