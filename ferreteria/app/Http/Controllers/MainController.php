<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    
    public function index(Request $request)
    {
        $texto = trim($request->get('textoBuscador'));
        $productos =  DB::select("call devolverProductos('%".$texto."%');");
        $parametros = [
            "arrayProductos" => $productos,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

       return view('index', $parametros);
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        //
    }

 
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy($id)
    {
        //
    }
}
