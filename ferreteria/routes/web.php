<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
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
Route::get('/',[MainController::class,'index']);
Route::get('/producto/create',[ProductosController::class,'create']);
 Route::get('/producto/edit/{codigo}',[ProductosController::class,'edit']);
 Route::post('/producto/{codigo}',[ProductosController::class,'store']);
 Route::patch('/producto/{codigo}',[ProductosController::class,'update']);
 Route::delete('/producto/delete/{codigo}',[ProductosController::class,'destroy']);




 //Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
