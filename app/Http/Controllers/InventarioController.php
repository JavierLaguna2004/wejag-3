<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventario = Inventario::with('medicamento')->get();
        return view('inventario.index')->with('inventario', $inventario);
    }

    public function create()
    {
        $medicamentos = Medicamento::all();
        return view('inventario.create')->with('medicamentos', $medicamentos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_medicamento' => 'required|exists:medicamentos,id|unique:inventario,id_medicamento',
            'cantidad' => 'required|integer|min:0'
        ]);

        Inventario::create($request->all());

        return redirect('/inventario')->with('success', 'Registro de inventario creado correctamente.');
    }

    public function show($id)
    {
        $item = Inventario::with('medicamento')->find($id);
        return view('inventario.delete')->with('item', $item);
    }

    public function edit($id)
    {
        $item = Inventario::find($id);
        $medicamentos = Medicamento::all();
        return view('inventario.editar', compact('item', 'medicamentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_medicamento' => 'required|exists:medicamentos,id|unique:inventario,id_medicamento,'.$id,
            'cantidad' => 'required|integer|min:0'
        ]);

        $item = Inventario::find($id);
        $item->update($request->all());

        return redirect('/inventario')->with('success', 'Registro de inventario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $item = Inventario::find($id);
        $item->delete();
        return redirect('/inventario')->with('success', 'Registro de inventario eliminado correctamente.');
    }

    public function eliminar($id)
    {
        $item = Inventario::with('medicamento')->find($id);
        return view('inventario.delete')->with('item', $item);
    }
}