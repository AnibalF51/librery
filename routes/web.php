<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CambiosController;

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
})->name('index');

Route::get('/acercade', function(){
    return view('acercade');
})->name('acercade');

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

Route::get('productos/agregar/{iden}', [ProductosController::class, 'agregar'])->name('productos.agregar');
Route::put('productos/actualizar/{iden}', [ProductosController::class, 'actualizar'])->name('productos.actualizar');


//VENTAS
Route::get('ventas/registro', [VentasController::class,'create'])->name('ventas.registro'); 
Route::post('ventas/guardar', [VentasController::class, 'guardar'])->name('ventas.guardar');
Route::get('ventas/detalle', [VentasController::class,'detalle'])->name('ventas.detalle');
Route::get('ventas/print/{id}', [VentasController::class, 'print'])->name('ventas.print');
Route::get('ventas/list', [VentasController::class, 'list'])->name('ventas.list');
Route::get('ventas/editar/{id}', [VentasController::class, 'editar'])->name('ventas.editar');
Route::put('ventas/update/{iden}', [VentasController::class, 'update'])->name('ventas.update');
Route::get('ventas/estado/{iden}', [VentasController::class, 'estado'])->name('ventas.estado');
Route::get('ventas/reportes', [VentasController::class, 'reportes'])->name('ventas.reportes');
Route::get('ventas/ranular/{id}', [VentasController::class, 'ranular'])->name('ventas.ranular');
Route::post('ventas/anular/{id}', [VentasController::class, 'anular'])->name('ventas.anular');
Route::get('ventas/abonos/{id}', [VentasController::class, 'abono'])->name('ventas.abono');
Route::post('ventas/gabono/{id}', [VentasController::class, 'gabono'])->name('ventas.gabono');
Route::get('ventas/labono', [VentasController::class, 'labono'])->name('ventas.labono');

//REPORTES
Route::post('ventas/pdia', [VentasController::class, 'pdia'])->name('ventas.pdia');
Route::post('ventas/prango', [VentasController::class, 'prango'])->name('ventas.prango');

//CAMBIOS
Route::get('cambios/list', [CambiosController::class, 'list'])->name('cambios.list');
Route::get('cambios/registro', [CambiosController::class, 'registro'])->name('cambios.registro');
Route::post('cambios/guardar', [CambiosController::class, 'guardar'])->name('cambios.guardar');