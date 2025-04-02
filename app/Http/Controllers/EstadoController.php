<?php

namespace App\Http\Controllers;

use App\Models\Estado; // Asegúrate de que el modelo Estado esté creado
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los estados
        $listaEstado = Estado::all();

        // Pasar los datos a la vista
        return view('estado.index')->with('destado', $listaEstado);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario de creación
        return view('estado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario (opcional)
        $request->validate([
            'estado_900' => 'required|string|max:255',
        ]);

        // Crear un nuevo estado
        $estado = new Estado();
        $estado->estado_900 = $request->get('estado_900');
        $estado->save();

        // Redirigir a la lista de estados
        return redirect('/estado')->with('success', 'Estado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el estado por su ID
        $estado = Estado::find($id);

        // Mostrar la vista de confirmación de eliminación
        return view('estado.delete')->with('estado', $estado);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el estado por su ID
        $estado = Estado::find($id);

        // Mostrar el formulario de edición
        return view('estado.editar')->with('estado', $estado);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario (opcional)
        $request->validate([
            'estado_900' => 'required|string|max:255',
        ]);

        // Obtener el estado por su ID
        $estado = Estado::find($id);
        $estado->estado_900 = $request->get('estado_900');
        $estado->save();

        // Redirigir a la lista de estados
        return redirect('/estado')->with('success', 'Estado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener el estado por su ID
        $eliminado = Estado::find($id);

        // Verificar si el estado existe
        if (!$eliminado) {
            return redirect('/estado')->with('error', 'El estado no existe.');
        }

        // Eliminar el estado
        $eliminado->delete();

        // Redirigir a la lista de estados
        return redirect('/estado')->with('success', 'Estado eliminado correctamente.');
    }

    /**
     * Método adicional para mostrar la vista de confirmación de eliminación.
     */
    public function eliminar(string $id)
    {
        // Buscar el estado por su ID
        $estado = Estado::find($id);
    
        // Verificar si el estado existe
        if (!$estado) {
            return redirect('/estado')->with('error', 'Estado no encontrado.');
        }
    
        // Mostrar la vista de confirmación de eliminación
        return view('estado.delete')->with('estado', $estado);
    }
}