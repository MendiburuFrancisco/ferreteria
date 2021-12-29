<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = $request->input('user');
        $password = $request->input('password');
        $cliente = DB::select("SELECT * FROM cliente WHERE usuario LIKE '".$user."' AND contrasenia LIKE '".$password."' LIMIT 5;");
        $parametros = [
            "cliente" => $cliente];

           // $cliente = $cliente->first(); 
           foreach ( $cliente as $clientes){

            Session::put('id',$clientes -> id_cliente);
            Session::put('nombre',$clientes ->   nombre); 
           return redirect('/');
           }
      
    }
    
    public function registro(Request $request)
    {
        $user = $request->input ('user');
        $password = $request->input('password');
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $date = $request->input('date');
        $tel = $request->input('tel');
        DB::insert('insert into cliente (usuario, contrasenia, nombre, apellido, email, fecha_nacimiento, telefono) values (?, ?, ?, ?, ?, ?, ?)'
                        , [$user, $password, $name, $lastname, $email, $date, $tel]);
                    return view ('inicio');
    }


    public function cerrarSesion()
    {
        Session::flush();

        return redirect('/');
    }


    public function historialPedidos()
    { 
        $idCliente = Session::get('id');

        $arraycl = DB::SELECT ("SELECT * FROM compra WHERE id_cliente LIKE '".$idCliente."' ");
        
        $parametro = [ 
            "pedidos" => $arraycl
                ];

        // $pedidos = null; // deberia traer de la base de datos aquellos pedidos que sean del usuario en cuestion

        return view('usuario.pedidos', $parametro );
    }


    public function detallesCompra($codigo)
    {
        $modo = 'historial';
        $arraydp = DB::SELECT (" SELECT p.codigo, p.nombre, 
        p.marca, p.precio, p.imagen, p.categoria, dc.subtotal, dc.cantidad
        FROM compra c
            INNER JOIN detalle_compra dc
                ON c.id_compra = dc.id_compra
            INNER JOIN producto p 
                ON dc.id_producto = p.codigo
        WHERE c.id_compra =" .$codigo);

        $arraydc = DB::SELECT ("SELECT c.id_compra, 
        dc.subtotal,dc.cantidad,p.precio,p.nombre,c.total, c.id_cliente,p.codigo
        FROM detalle_compra dc
            INNER JOIN compra c
                ON dc.id_compra = c.id_compra
            INNER JOIN producto p 
                ON p.codigo = dc.id_producto
            AND c.id_compra = " .$codigo);

            $parametros = [
                "arrayProductos" => $arraydp,
                "detallesProductosDelCarrito" => $arraydc,
                "modo" => $modo
            ];

        return view( 'carrito.index', $parametros);
    }
    
    public function detallesCuenta()
    { 
        $idCliente = Session::get('id');
        $cliente = null; // deberia traer el cliente de la base de datos o tomar los datos de Session::get para mostrarlos


        return view('usuario.detalles');
    }

    public function inicio()
    { 
    
        return view('usuario.principal');
    }

    // Esta funcion deberia guardar los cambios realizados en el perfil
    // borrarla en caso de que el boton "Finalizar" sirva para otra cosa
    public function guardarCambios()
    {

        return redirect('/');
    }

}
