<?php

namespace App\Http\Controllers;

use App\Models\Car;
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
        $validate = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'km' => 'required',
            'averias' => 'required',
            'descAveria' => 'required',
            'fotoCoche' => 'required|image',
            'client_id' => 'required',
        ]);

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
            //return $exception->errorInfo;
            return redirect()->route('registrarCoche')->with('error', 1);
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
        //$coche = $user->cars()->get()->where('id',$id);
        return view('factura')->with('coche', $coche);
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
        //
    }
}
