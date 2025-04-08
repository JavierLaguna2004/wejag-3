<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\Venta;
use App\Models\Medicamento;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{
    public function index()
    {
        $devoluciones = Devolucion::with(['venta', 'medicamento'])->get();
        return view('devolucion.index', compact('devoluciones'));
    }

    public function create($venta_id = null)
    {
        $ventas = Venta::with(['detalles.medicamento'])->get();
        $medicamentos = [];
        
        if ($venta_id) {
            $ventaSeleccionada = Venta::with(['detalles.medicamento'])->find($venta_id);
            $medicamentos = $ventaSeleccionada->detalles->map(function ($detalle) {
                return $detalle->medicamento;
            });
        }
        
        return view('devolucion.create', compact('ventas', 'medicamentos', 'venta_id'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $request->validate([
                'id_venta' => 'required|exists:ventas,id',
                'id_medicamento' => 'required|exists:medicamentos,id',
                'cantidad' => 'required|integer|min:1',
                'motivo' => 'required|string|max:500'
            ]);
            
            // Verificar que el medicamento pertenece a la venta
            $venta = Venta::with(['detalles'])->find($request->id_venta);
            $detalleVenta = $venta->detalles->where('id_medicamento', $request->id_medicamento)->first();
            
            if (!$detalleVenta) {
                throw new \Exception("El medicamento no pertenece a esta venta");
            }
            
            if ($request->cantidad > $detalleVenta->cantidad) {
                throw new \Exception("La cantidad a devolver no puede ser mayor a la vendida");
            }
            
            // Crear devolución
            $devolucion = Devolucion::create([
                'id_venta' => $request->id_venta,
                'id_medicamento' => $request->id_medicamento,
                'cantidad' => $request->cantidad,
                'motivo' => $request->motivo
            ]);
            
            // Actualizar inventario
            $inventario = Inventario::where('id_medicamento', $request->id_medicamento)->first();
            if ($inventario) {
                $inventario->cantidad += $request->cantidad;
                $inventario->save();
            } else {
                Inventario::create([
                    'id_medicamento' => $request->id_medicamento,
                    'cantidad' => $request->cantidad
                ]);
            }
            
            DB::commit();
            
            return redirect('/devolucion')->with('success', 'Devolución registrada correctamente');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $devolucion = Devolucion::with(['venta', 'medicamento'])->find($id);
        return view('devolucion.show', compact('devolucion'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        
        try {
            $devolucion = Devolucion::find($id);
            
            // Revertir inventario
            $inventario = Inventario::where('id_medicamento', $devolucion->id_medicamento)->first();
            if ($inventario) {
                $inventario->cantidad -= $devolucion->cantidad;
                if ($inventario->cantidad < 0) $inventario->cantidad = 0;
                $inventario->save();
            }
            
            $devolucion->delete();
            
            DB::commit();
            
            return redirect('/devolucion')->with('success', 'Devolución eliminada correctamente');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}