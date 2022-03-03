<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Client::all();
        return view('taller')->with('usuarios', $usuarios);
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

        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellidos.required' => 'El campo apellidos es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Debes de escribir un formado de email válido',
            'dni.required' => 'El campo DNI es obligatorio',
            'tlf.required' => 'El campo teléfono es obligatorio',
            'tlf.numeric' => 'Escribe un número válido'
        ];

        $validate = $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'dni' => 'required',
            'tlf' => 'required|numeric',
        ],$messages);

        try {
            $newClient = new Client();

            $newClient->nombre = $request->nombre;
            $newClient->apellidos = $request->apellidos;
            $newClient->email = $request->email;
            $newClient->dni = $request->dni;
            $newClient->tlf = $request->tlf;
            $newClient->save();

            return view('registroCoche')->with('clienteId',$newClient->id)->with('nuevoCliente',$newClient->nombre ." ". $newClient->apellidos);
        } catch (QueryException $exception) {
            //return $exception->errorInfo;
            return redirect()->route('registrarCoche')->with('errorCliente', 1);
        }
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
