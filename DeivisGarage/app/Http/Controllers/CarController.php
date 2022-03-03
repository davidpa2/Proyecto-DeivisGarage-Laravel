<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Guardar los datos del usuario que está logueado
        $user = User::find(Auth::id());
        //Consulta multitabla para sacar los coches del usuario autentificado
        $coches = $user->cars()->get();
        return view('taller')->with('coches', $coches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('car.create');
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
            'marca.required' => 'El campo marca es obligatorio',
            'modelo.required' => 'El campo modelo es obligatorio',
            'km.required' => 'El campo kilómeros es obligatorio',
            'km.numeric' => 'Debes de escribir un número',
            'averias.required' => 'El campo número de averías es obligatorio',
            'averias.numeric' => 'Debes de escribir un número',
            'descAveria.required' => 'El campo descripción de avería es obligatorio',
            'fotoCoche.required' => 'El campo foto del coche es obligatorio',
            'client_id.required' => 'Debes seleccionar un cliente'
        ];

        $validate = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'km' => 'required|numeric',
            'averias' => 'required|numeric',
            'descAveria' => 'required',
            'fotoCoche' => 'required|image',
            'client_id' => 'required',
        ],$messages);

        try {
            $newCar = new Car();

            $newCar->marca = $request->marca;
            $newCar->modelo = $request->modelo;
            $newCar->km = $request->km;
            $newCar->averias = $request->averias;
            $newCar->descripcionAveria = $request->descAveria;
            $newCar->estado = "en cola";
            $newCar->user_id = Auth::id();
            $newCar->client_id = $request->client_id;
            $nombrefoto = time() . "_" . $request->file('fotoCoche')->getClientOriginalName();
            $newCar->foto = $nombrefoto;
            $newCar->save();

            $request->file('fotoCoche')->storeAs('public/img_cars', $nombrefoto);

            return redirect()->route('taller');
        } catch (QueryException $exception) {
            return $exception->errorInfo;
            //return redirect()->route('registrarCoche')->with('error', 1);
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
        $coche = Car::findOrFail($id);
        $cliente = Client::findOrFail($coche->client_id);
        //$cocheCliente = $coche->clients()->get()->where('id',$coche->id);
        return view('factura')->with('coche', $coche)->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coche = Car::findOrFail($id);

        $coche->delete();

        return redirect()->route('car.index');
    }
}