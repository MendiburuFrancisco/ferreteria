<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    
    public function index(Request $request)
    {
       
        $categorias = DB::select("call devolverTodasLasCategorias()");
        $texto = trim($request->get('textoBuscador'));
        $productos =  DB::select("call devolverProductos('%".$texto."%');");
        $parametros = [
            "categorias" => $categorias,
            "arrayProductos" => $productos,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

       return view('index', $parametros);
    } 

    public function filtrar(Request $request)
    {
        
        $buscador = trim($request->get('textoBuscador'));
        $precioMin =trim($request->get('precioMin'));
        $precioMax =trim($request->get('precioMax'));

        $categorias = DB::select("call devolverTodasLasCategorias()");
        if($precioMin == null && $precioMax == null)
        {
            $productos =  DB::select("call devolverProductos('%".$buscador."%');");
        } else if($precioMax != null || $precioMax != null)
        {
            $precioMax = ($precioMax == "")? "null": $precioMax;
            $precioMin = ($precioMin == "")? "null": $precioMin;
            $productos =  DB::select("call devolverProductosConFiltro(".$precioMin.",".$precioMax.");");
            
        }
        
        $parametros = [
            "categorias" => $categorias,
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
