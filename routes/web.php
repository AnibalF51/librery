<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;

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
//USUARIOS
Route::middleware(['auth:sanctum', 'verified'])->get('/index', function () {
    return view('index');
})->name('dashboard');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('profile/show', function () {
    return view('profile/show');
})->name('profile'); 

//PRODUCTOS

Route::get('productos/registro', [ProductosController::class,'create'])->name('productos.registro');
Route::get('productos/index', [ProductosController::class, 'index'])->name('productos.index');
Route::post('productos/guardar', [ProductosController::class, 'guardar'])->name('productos.guardar');

Route::get('productos/editar/{iden}', [ProductosController::class, 'editar'])->name('productos.editar');
Route::put('productos/update/{iden}', [ProductosController::class, 'update'])->name('productos.update');

//VENTAS
Route::get('ventas/registro', [VentasController::class,'create'])->name('ventas.registro'); 
Route::post('ventas/guardar', [VentasController::class, 'guardar'])->name('ventas.guardar');