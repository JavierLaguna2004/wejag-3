<?php

namespace App\Http\Controllers;

use App\Models\Alquiler; // Asegúrate de que el modelo Alquiler esté creado
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los alquileres
        $listaAlquileres = Alquiler::all();

        // Pasar los datos a la vista
        return view('alquiler.index')->with('alquileres', $listaAlquileres);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario de creación
        return view('alquiler.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_ini_500' => 'required|date',
            'fecha_fin_500' => 'required|date',
            'seguro_500' => 'required|boolean',
            'precio_500' => 'required|numeric',
            'id_400' => 'required|integer',
            'codigo_100' => 'required|integer',
            'dni_300' => 'required|integer',
        ]);

        // Crear un nuevo alquiler
        $alquiler = new Alquiler();
        $alquiler->fecha_ini_500 = $request->fecha_ini_500;
        $alquiler->fecha_fin_500 = $request->fecha_fin_500;
        $alquiler->seguro_500 = $request->seguro_500;
        $alquiler->precio_500 = $request->precio_500;
        $alquiler->id_400 = $request->id_400;
        $alquiler->codigo_100 = $request->codigo_100;
        $alquiler->dni_300 = $request->dni_300;
        $alquiler->save();

        // Redirigir a la lista de alquileres
        return redirect('/alquiler')->with('success', 'Alquiler creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el alquiler por su ID
        $alquiler = Alquiler::find($id);

        // Verificar si el alquiler existe
        if (!$alquiler) {
            return redirect('/alquiler')->with('error', 'Alquiler no encontrado.');
        }

        // Mostrar la vista con los detalles del alquiler
        return view('alquiler.show')->with('alquiler', $alquiler);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el alquiler por su ID
        $alquiler = Alquiler::find($id);

        // Verificar si el alquiler existe
        if (!$alquiler) {
            return redirect('/alquiler')->with('error', 'Alquiler no encontrado.');
        }

        // Mostrar el formulario de edición
        return view('alquiler.edit')->with('alquiler', $alquiler);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_ini_500' => 'required|date',
            'fecha_fin_500' => 'required|date',
            'seguro_500' => 'required|boolean',
            'precio_500' => 'required|numeric',
            'id_400' => 'required|integer',
            'codigo_100' => 'required|integer',
            'dni_300' => 'required|integer',
        ]);

        // Obtener el alquiler por su ID
        $alquiler = Alquiler::find($id);

        if (!$alquiler) {
            return redirect('/alquiler')->with('error', 'Alquiler no encontrado.');
        }

        // Actualizar los datos del alquiler
        $alquiler->fecha_ini_500 = $request->fecha_ini_500;
        $alquiler->fecha_fin_500 = $request->fecha_fin_500;
        $alquiler->seguro_500 = $request->seguro_500;
        $alquiler->precio_500 = $request->precio_500;
        $alquiler->id_400 = $request->id_400;
        $alquiler->codigo_100 = $request->codigo_100;
        $alquiler->dni_300 = $request->dni_300;
        $alquiler->save();

        // Redirigir a la lista de alquileres
        return redirect('/alquiler')->with('success', 'Alquiler actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener el alquiler por su ID
        $alquiler = Alquiler::find($id);

        if (!$alquiler) {
            return redirect('/alquiler')->with('error', 'Alquiler no encontrado.');
        }

        // Eliminar el alquiler
        $alquiler->delete();

        // Redirigir a la lista de alquileres
        return redirect('/alquiler')->with('success', 'Alquiler eliminado correctamente.');
    }

    /**
     * Método adicional para mostrar la vista de confirmación de eliminación.
     */
    public function eliminar(string $id)
    {
        // Buscar el alquiler por su ID
        $alquiler = Alquiler::find($id);

        // Verificar si el alquiler existe
        if (!$alquiler) {
            return redirect('/alquiler')->with('error', 'Alquiler no encontrado.');
        }

        // Mostrar la vista de confirmación de eliminación
        return view('alquiler.delete')->with('alquiler', $alquiler);
    }
}
