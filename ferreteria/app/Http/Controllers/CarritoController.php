<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

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
        return redirect('/carrito');

    }

    public function realizarPedido()
    {
        $idCliente = Session::get('id');
  

        $detallesDelProductoDelCarrito = DB::select(' call devolverDetallesDeProductosDelCarrito('.$idCliente.')');
        $id_compra = $detallesDelProductoDelCarrito[0] -> id_compra;
        $detalleCompra = DB::select(' call devolverDetalleCompra('. $id_compra.')');
        $apellidoYnombre = $detalleCompra[0] -> apellidoYnombre;
        $fecha_hora = $detalleCompra[0] -> fecha_hora;

        DB::select('call realizarPedido('.$idCliente.')');
        $parametros = [ 
            "detalleCompra" => $detalleCompra,
            "id_compra" => $id_compra,
            "fecha_hora" => $fecha_hora,
            "apellidoYnombre" => $apellidoYnombre
        ];

        return view('carrito.ticket',$parametros);
    }

   
    public function eliminarProducto($codigo)
    {
        $idCliente = Session::get('id');
        DB::select('call eliminarProducto('.$idCliente.','. $codigo.')');
        return redirect('/carrito');
    }

    public function modificarProducto(Request $request, $codigo,$cantidad)
    {
        $idCliente = Session::get('id'); 
        DB::select('call modificarPedido('.$idCliente.','. $codigo.','.$cantidad.')');
        return redirect('/carrito');
    }
}
