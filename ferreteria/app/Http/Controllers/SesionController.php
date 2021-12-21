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

            $inicio = new InicioController();
           return $inicio-> index();
           }
        
        //return view ('usuario.modal.passyuser', $parametros);
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
