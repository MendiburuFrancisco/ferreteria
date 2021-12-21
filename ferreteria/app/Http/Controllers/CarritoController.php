<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idCliente = Session::get('id');
        $productosDelCarrito = DB::select('call devolverProductosDelCarrito('.$idCliente.')');
        $detallesDelProductoDelCarrito = DB::select(' call devolverDetallesDeProductosDelCarrito('.$idCliente.')');
        $parametros = [
            "arrayProductos" => $productosDelCarrito,
            "detallesProductosDelCarrito" => $detallesDelProductoDelCarrito,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

        return view('carrito.index',$parametros);
    }

    public function agregarProducto(Request $request)
    {
       $cantidadDelProducto =  $request ->get('cantidadProducto');
       $codigoDelProducto =  $request->get('codigoDelProducto');

       $idCliente = Session::get('id');
        # `agregarProducto`(id_cliente int(11), codigo_producto int(11), cantidad_producto int(5))
        DB::select('call agregarProducto('.$idCliente.','. $codigoDelProducto .','.$cantidadDelProducto.')');

       /**$productosDelCarrito = DB::select('call devolverProductosDelCarrito('.$idCliente.')');

       $parametros = [
           "arrayProductos" => $productosDelCarrito,
           "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
       ];
       
       return view('carrito.index',$parametros); **/

       return redirect('/carrito');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
