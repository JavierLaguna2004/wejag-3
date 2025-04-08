<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Medicamento;
use App\Models\Inventario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['usuario', 'detalles.medicamento'])->get();
        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $medicamentos = Medicamento::all();
        $usuarios = Usuario::all();
        return view('venta.create', compact('medicamentos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'medicamentos' => 'required|array|min:1',
            'medicamentos.*.id' => 'required|exists:medicamentos,id',
            'medicamentos.*.cantidad' => 'required|integer|min:1'
        ]);
    
        DB::beginTransaction();
        
        try {
            // Create sale
            $venta = Venta::create([
                'id_usuario' => $request->id_usuario,
                'fecha' => now(),
                'total' => 0
            ]);
            
            // Process sale details
            $total = 0;
            foreach ($request->medicamentos as $medicamento) {
                $med = Medicamento::findOrFail($medicamento['id']);
                
                $subtotal = $med->precio * $medicamento['cantidad'];
                
                DetalleVenta::create([
                    'id_venta' => $venta->id,
                    'id_medicamento' => $medicamento['id'],
                    'cantidad' => $medicamento['cantidad'],
                    'subtotal' => $subtotal
                ]);
                
                $total += $subtotal;
                
                // Update inventory
                $inventario = Inventario::where('id_medicamento', $medicamento['id'])->first();
                if ($inventario) {
                    if ($inventario->cantidad < $medicamento['cantidad']) {
                        throw new \Exception("No hay suficiente stock para {$med->nombre}");
                    }
                    $inventario->cantidad -= $medicamento['cantidad'];
                    $inventario->save();
                }
            }
            
            // Update sale total
            $venta->total = $total;
            $venta->save();
            
            DB::commit();
            
            return redirect('/venta')->with('success', 'Venta registrada correctamente.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error al registrar la venta: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $venta = Venta::with(['usuario', 'detalles.medicamento'])->find($id);
        return view('venta.show', compact('venta'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        
        try {
            $venta = Venta::find($id);
            
            // Return stock to inventory
            foreach ($venta->detalles as $detalle) {
                $inventario = Inventario::where('id_medicamento', $detalle->id_medicamento)->first();
                if ($inventario) {
                    $inventario->cantidad += $detalle->cantidad;
                    $inventario->save();
                }
            }
            
            $venta->delete();
            
            DB::commit();
            
            return redirect('/venta')->with('success', 'Venta eliminada correctamente.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar la venta: ' . $e->getMessage());
        }
    }
}