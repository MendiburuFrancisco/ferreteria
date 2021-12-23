<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = DB::select("call devolverTodasLasCategorias()");
        $productos =  DB::select("SELECT * FROM producto  ORDER BY precio DESC LIMIT 4");
        $parametros = [
            "categorias" => $categorias,
            "arrayProductos" => $productos,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

        return view('inicio',$parametros);
    }


}
