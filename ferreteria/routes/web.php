<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\MainController;
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
// RUTAS VARIAS
   Route::get('/clientes', [ClientesController::class,'index']);
   Route::post('/registro', [ClientesController::class,'store']);
 
 
// RUTAS PARA LA TIENDA
Route::get('/',[InicioController::class,'index']);
Route::get('/tienda',[MainController::class,'index']);
Route::get('/tienda/filtrar',[MainController::class,'filtrar']);

// RUTAS PARA EL PRODUCTO
Route::get('/producto',[ProductosController::class,'index']);
Route::get('/producto/create',[ProductosController::class,'create']);
Route::get('/producto/edit/{codigo}',[ProductosController::class,'edit']);
Route::get('/producto/show/{codigo}',[ProductosController::class,'show']);
Route::post('/producto/{codigo}',[ProductosController::class,'store']);
Route::patch('/producto/{codigo}',[ProductosController::class,'update']);
Route::delete('/producto/delete/{codigo}',[ProductosController::class,'destroy']);

// RUTAS PARA EL USUARIO
Route::post('/sesion/login/', [SesionController::class, 'login']);
Route::post('/sesion/registro/', [SesionController::class, 'registro']); 
Route::get('/sesion/salir/', [SesionController::class, 'cerrarSesion']);
Route::get('/sesion/principal', [SesionController::class, 'inicio']);
Route::get('/sesion/detalles', [SesionController::class, 'detallesCuenta']);
Route::get('/sesion/pedidos/', [SesionController::class, 'historialPedidos']);
Route::post('/sesion/guardarCambios',[SesionController::class, 'guardarCambios']);


// RUTAS PARA EL CARRITO
Route::post('/carrito/agregar',[CarritoController::class,'agregarProducto']);
Route::get('/carrito',[CarritoController::class,'index']);
Route::get('/carrito/realizarPedido',[CarritoController::class,'realizarPedido']);
Route::delete('/carrito/eliminarProducto/{codigo}',[CarritoController::class,'eliminarProducto']);
Route::patch('/carrito/modificarProducto/{codigo}/{cantidad}',[CarritoController::class,'modificarProducto']);

 //Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
