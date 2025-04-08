<?php

namespace App\Http\Controllers;

use App\Models\EntradaInventario;
use App\Models\Medicamento;
use App\Models\Inventario;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class EntradaInventarioController extends Controller
{
    public function index()
    {
        $entradas = EntradaInventario::with(['medicamento', 'proveedor'])->get();
        return view('entrada-inventario.index')->with('entradas', $entradas);
    }

    public function create()
    {
        $medicamentos = Medicamento::all();
        $proveedores = Proveedor::all();
        return view('entrada-inventario.create', compact('medicamentos', 'proveedores'));
    }
    private function updateInventory($id_medicamento, $cantidad)
    {
        $inventario = Inventario::where('id_medicamento', $id_medicamento)->first();
        
        if ($inventario) {
            $inventario->cantidad += $cantidad;
            $inventario->save();
        } else {
            Inventario::create([
                'id_medicamento' => $id_medicamento,
                'cantidad' => $cantidad
            ]);
        }
    }   

    public function store(Request $request)
    {
        $request->validate([
            'id_medicamento' => 'required|exists:medicamentos,id',
            'id_proveedor' => 'required|exists:proveedores,id',
            'cantidad' => 'required|integer|min:1',
            'fecha' => 'required|date'
        ]);

        EntradaInventario::create($request->all());
        $this->updateInventory($request->id_medicamento, $request->cantidad);
        return redirect('/entrada-inventario')->with('success', 'Entrada de inventario registrada correctamente.');
    }

    public function show($id)
    {
        $entrada = EntradaInventario::with(['medicamento', 'proveedor'])->find($id);
        return view('entrada-inventario.delete')->with('entrada', $entrada);
    }

    public function edit($id)
    {
        $entrada = EntradaInventario::find($id);
        $medicamentos = Medicamento::all();
        $proveedores = Proveedor::all();
        return view('entrada-inventario.editar', compact('entrada', 'medicamentos', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_medicamento' => 'required|exists:medicamentos,id',
            'id_proveedor' => 'required|exists:proveedores,id',
            'cantidad' => 'required|integer|min:1',
            'fecha' => 'required|date'
        ]);

        $entrada = EntradaInventario::find($id);
        $entrada->update($request->all());

        return redirect('/entrada-inventario')->with('success', 'Entrada de inventario actualizada correctamente.');
    }

    public function destroy($id)
    {
        $entrada = EntradaInventario::find($id);
        $entrada->delete();
        return redirect('/entrada-inventario')->with('success', 'Entrada de inventario eliminada correctamente.');
    }

    public function eliminar($id)
    {
        $entrada = EntradaInventario::with(['medicamento', 'proveedor'])->find($id);
        return view('entrada-inventario.delete')->with('entrada', $entrada);
    }
}