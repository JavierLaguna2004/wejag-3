<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los vehículos
        $listaVehiculo = Vehiculo::all();

        // Pasar los datos a la vista
        return view('vehiculo.index')->with('dvehiculo', $listaVehiculo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario de creación
        return view('vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'grupo_200' => 'required|string|max:255',
            'marca_200' => 'required|string|max:255',
            'modelo_200' => 'required|string|max:255',
            'cant_puertas_200' => 'required|integer',
            'cant_plazas_200' => 'required|integer',
            'cap_maletero_200' => 'required|integer',
            'edad_min_200' => 'required|integer',
            'estado_200' => 'required|string|max:255',
            'fecha_ing_200' => 'required|date',
            'matricula_200' => 'required|string|max:255',
            'codigo_100' => 'required|integer',
        ]);

        // Crear un nuevo vehículo
        $vehiculo = new Vehiculo();
        $vehiculo->grupo_200 = $request->grupo_200;
        $vehiculo->marca_200 = $request->marca_200;
        $vehiculo->modelo_200 = $request->modelo_200;
        $vehiculo->cant_puertas_200 = $request->cant_puertas_200;
        $vehiculo->cant_plazas_200 = $request->cant_plazas_200;
        $vehiculo->cap_maletero_200 = $request->cap_maletero_200;
        $vehiculo->edad_min_200 = $request->edad_min_200;
        $vehiculo->estado_200 = $request->estado_200;
        $vehiculo->fecha_ing_200 = $request->fecha_ing_200;
        $vehiculo->matricula_200 = $request->matricula_200;
        $vehiculo->codigo_100 = $request->codigo_100;
        $vehiculo->save();

        // Redirigir a la lista de vehículos
        return redirect('/vehiculo')->with('success', 'Vehículo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el vehículo por su ID
        $vehiculo = Vehiculo::find($id);

        // Mostrar la vista de confirmación de eliminación
        return view('vehiculo.delete')->with('vehiculo', $vehiculo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el vehículo por su ID
        $vehiculo = Vehiculo::find($id);

        // Mostrar el formulario de edición
        return view('vehiculo.editar')->with('vehiculo', $vehiculo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'grupo_200' => 'required|string|max:255',
            'marca_200' => 'required|string|max:255',
            'modelo_200' => 'required|string|max:255',
            'cant_puertas_200' => 'required|integer',
            'cant_plazas_200' => 'required|integer',
            'cap_maletero_200' => 'required|integer',
            'edad_min_200' => 'required|integer',
            'estado_200' => 'required|string|max:255',
            'fecha_ing_200' => 'required|date',
            'matricula_200' => 'required|string|max:255',
            'codigo_100' => 'required|integer',
        ]);

        // Obtener el vehículo por su ID
        $vehiculo = Vehiculo::find($id);

        // Actualizar los datos del vehículo
        $vehiculo->grupo_200 = $request->grupo_200;
        $vehiculo->marca_200 = $request->marca_200;
        $vehiculo->modelo_200 = $request->modelo_200;
        $vehiculo->cant_puertas_200 = $request->cant_puertas_200;
        $vehiculo->cant_plazas_200 = $request->cant_plazas_200;
        $vehiculo->cap_maletero_200 = $request->cap_maletero_200;
        $vehiculo->edad_min_200 = $request->edad_min_200;
        $vehiculo->estado_200 = $request->estado_200;
        $vehiculo->fecha_ing_200 = $request->fecha_ing_200;
        $vehiculo->matricula_200 = $request->matricula_200;
        $vehiculo->codigo_100 = $request->codigo_100;
        $vehiculo->save();

        // Redirigir a la lista de vehículos
        return redirect('/vehiculo')->with('success', 'Vehículo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener el vehículo por su ID
        $vehiculo = Vehiculo::find($id);

        // Verificar si el vehículo existe
        if (!$vehiculo) {
            return redirect('/vehiculo')->with('error', 'Vehículo no encontrado.');
        }

        // Eliminar el vehículo
        $vehiculo->delete();

        // Redirigir a la lista de vehículos
        return redirect('/vehiculo')->with('success', 'Vehículo eliminado correctamente.');
    }

    /**
     * Método adicional para mostrar la vista de confirmación de eliminación.
     */
    public function eliminar(string $id)
    {
        // Obtener el vehículo por su ID
        $vehiculo = Vehiculo::find($id);

        // Verificar si el vehículo existe
        if (!$vehiculo) {
            return redirect('/vehiculo')->with('error', 'Vehículo no encontrado.');
        }

        // Mostrar la vista de confirmación de eliminación
        return view('vehiculo.delete')->with('vehiculo', $vehiculo);
    }
}