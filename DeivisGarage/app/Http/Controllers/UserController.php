<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellidos.required' => 'El campo apellidos es obligatorio',
            'dni.required' => 'El campo DNI es obligatorio',
            'tlf.required' => 'El campo teléfono es obligatorio',
            'tlf.numeric' => 'Escribe un número válido',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Debes de escribir un formado de email válido',
            'pass.required' => 'Escriba una contraseña',
        ];

        $validate = $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'tlf' => 'required|numeric',
            'email' => 'required|email',
            'pass' => 'required',
        ],$messages);

        try {
            $newUser = new User();

            $newUser->nombre = $request->nombre;
            $newUser->apellidos = $request->apellidos;
            $newUser->dni = $request->dni;
            $newUser->rol_id = 2;
            $newUser->tlf = $request->tlf;
            $newUser->email = $request->email;
            $newUser->password = Hash::make($request->pass);


            $newUser->save();

            return redirect()->route('mecanicos');
        } catch (QueryException $exception) {
            //return $exception->errorInfo;
            return redirect()->route('registrarMecanico')->with('error', 1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mecanico = User::findOrFail($id);
        return view('modificarMecanico')->with('mecanico', $mecanico);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellidos.required' => 'El campo apellidos es obligatorio',
            'dni.required' => 'El campo DNI es obligatorio',
            'tlf.required' => 'El campo teléfono es obligatorio',
            'tlf.numeric' => 'Escribe un número válido',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Debes de escribir un formado de email válido',
        ];

        $validate = $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'tlf' => 'required',
            'email' => 'required|email',
        ],$messages);

        try {
            $user = User::findOrFail($id);

            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->dni = $request->dni;
            $user->tlf = $request->tlf;
            $user->email = $request->email;

            $user->save();

            return view('mecanicos')->with('mecanicoNombre', $user->nombre)->with('mecanicoApellidos', $user->apellidos);
        } catch (QueryException $exception) {
            return $exception->errorInfo;
            //return redirect()->route('modificarMecanico')->with('error', 1);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return view('mecanicos')->with('deletedNombre', $usuario->nombre)->with('deletedApellidos', $usuario->apellidos);
    }
}
