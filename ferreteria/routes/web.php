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


Route::get('/', function () {
    $arrayNombres = ["Francisco","JuanPablo","Tomas","Jean","Ivo"];
    return view('telefonia')-> with("nombres",$arrayNombres);
   // return view('welcome');
});
 */
   Route::get('/clientes', [ClientesController::class,'index']);
  // Route::get('/clientes/create', [ClientesController::class,'create']);
   Route::post('/registro', [ClientesController::class,'store']);
  // Route::get('/clientes/{id}',[ClientesController::class,'show']);
   // HAY QUE HACER UN DELETE DESDE UN FORMULARIO DESDE BLADE QUE TIENE UN METODO PARA ELIMINARLO, VER DOCUMENTACION DIRECTIVA @METHOD
 //  Route::get('/clientes',[ClientesController::class,'destroy']);   

  // Route::resource('/clientes',ClientesController::class) ->except('index','destroy','show');
   
  // Route::resource('/clientes',ClientesController::class) ->only('create');
 Route::get('/producto',[ProductosController::class,'index']);
 //Route::get('/', function(){return view('main');});
// Route::get('/','app\Http\Controllers\MainController@index');

// RUTAS PARA LA TIENDA
Route::get('/',[InicioController::class,'index']);
Route::get('/tienda',[MainController::class,'index']);
Route::get('/tienda/filtrar',[MainController::class,'filtrar']);

// RUTAS PARA EL PRODUCTO
Route::get('/producto/create',[ProductosController::class,'create']);
Route::get('/producto/edit/{codigo}',[ProductosController::class,'edit']);
Route::get('/producto/show/{codigo}',[ProductosController::class,'show']);
Route::post('/producto/{codigo}',[ProductosController::class,'store']);
Route::patch('/producto/{codigo}',[ProductosController::class,'update']);
Route::delete('/producto/delete/{codigo}',[ProductosController::class,'destroy']);

// RUTAS PARA EL USUARIO
Route::post('/sesion/login/', [SesionController::class, 'login']);
Route::post('/sesion/registro/', [SesionController::class, 'registro']);

// RUTAS PARA EL CARRITO
Route::post('/carrito/agregar',[CarritoController::class,'agregarProducto']);
Route::get('/carrito',[CarritoController::class,'index']);
Route::get('/carrito/realizarPedido',[CarritoController::class,'realizarPedido']);
Route::delete('/carrito/eliminarProducto/{codigo}',[CarritoController::class,'eliminarProducto']);

 //Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
