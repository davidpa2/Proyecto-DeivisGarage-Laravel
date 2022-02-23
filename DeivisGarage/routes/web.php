<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\FrutasController;
use Illuminate\Support\Facades\Route;

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
})->name('taller');;

Route::get('/registrarCoche', function () {
    return view('registroCoche');
})->name('registrarCoche');

//Rutas al controlador de recursos
Route::resource('car', CarController::class)->middleware(['auth','verified']);

/*Route::get('/taller', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';
