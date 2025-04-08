<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::with('proveedor')->get();
        return view('medicamento.index')->with('medicamentos', $medicamentos);
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('medicamento.create')->with('proveedores', $proveedores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'required|in:tableta,cápsula,ml,mg,g',
            'precio' => 'required|numeric|min:0',
            'id_proveedor' => 'required|exists:proveedores,id',
            'fecha_vencimiento' => 'required|date|after:today'
        ]);

        Medicamento::create($request->all());

        return redirect('/medicamento')->with('success', 'Medicamento creado correctamente.');
    }

    public function show($id)
    {
        $medicamento = Medicamento::with('proveedor')->find($id);
        return view('medicamento.delete')->with('medicamento', $medicamento);
    }

    public function edit($id)
    {
        $medicamento = Medicamento::find($id);
        $proveedores = Proveedor::all();
        return view('medicamento.editar')->with([
            'medicamento' => $medicamento,
            'proveedores' => $proveedores
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'required|in:tableta,cápsula,ml,mg,g',
            'precio' => 'required|numeric|min:0',
            'id_proveedor' => 'required|exists:proveedores,id',
            'fecha_vencimiento' => 'required|date'
        ]);

        $medicamento = Medicamento::find($id);
        $medicamento->update($request->all());

        return redirect('/medicamento')->with('success', 'Medicamento actualizado correctamente.');
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::find($id);
        $medicamento->delete();
        return redirect('/medicamento')->with('success', 'Medicamento eliminado correctamente.');
    }

    public function eliminar($id)
    {
        $medicamento = Medicamento::with('proveedor')->find($id);
        return view('medicamento.delete')->with('medicamento', $medicamento);
    }
}