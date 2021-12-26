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
        $pedidos = null; // deberia traer de la base de datos aquellos pedidos que sean del usuario en cuestion

        return view('/sesion/pedidos');
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
