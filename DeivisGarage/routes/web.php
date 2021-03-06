<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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
})->name('taller')->middleware(['auth','verified']);

Route::get('/registrarCoche', function () {
    return view('registroCoche');
})->name('registrarCoche')->middleware(['auth','verified']);

Route::get('/mecanicos', function () {
    return view('mecanicos');
})->name('mecanicos')->middleware(['auth','verified','administrador']);

Route::get('/registrarMecanico', function () {
    return view('registrarMecanico');
})->name('registrarMecanico')->middleware(['auth','verified','administrador']);

Route::get('/historial', function () {
    return view('historialReparaciones');
})->name('historial')->middleware(['auth','verified']);

Route::get('/factura/{id}', [CarController::class,'show'])->name('factura');

//Rutas al controlador de recursos de cada entidad
Route::resource('car', CarController::class)->middleware(['auth','verified']);
Route::resource('client', ClientController::class)->middleware(['auth','verified']);
Route::resource('user', UserController::class)->middleware(['auth','verified']);

/*Route::get('/taller', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


require __DIR__.'/auth.php';
