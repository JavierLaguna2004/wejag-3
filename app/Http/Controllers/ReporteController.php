<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Medicamento;
use App\Models\Proveedor;
use App\Models\Inventario;
use App\Models\Devolucion;
use Carbon\Carbon;
use PDF;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function ventas(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $fechaFin = $request->input('fecha_fin', Carbon::now()->endOfMonth()->format('Y-m-d'));

        $ventas = Venta::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->with('usuario')
            ->orderBy('fecha', 'desc')
            ->get();

        $totalVentas = $ventas->sum('total');

        if ($request->has('exportar') && $request->exportar == 'pdf') {
            $pdf = PDF::loadView('reportes.ventas_pdf', compact('ventas', 'totalVentas', 'fechaInicio', 'fechaFin'));
            return $pdf->download('reporte_ventas_'.now()->format('YmdHis').'.pdf');
        }

        return view('reportes.ventas', compact('ventas', 'totalVentas', 'fechaInicio', 'fechaFin'));
    }

    public function medicamentosVendidos(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $fechaFin = $request->input('fecha_fin', Carbon::now()->endOfMonth()->format('Y-m-d'));

        $medicamentos = DetalleVenta::selectRaw('id_medicamento, sum(cantidad) as total_vendido, sum(subtotal) as total_ingresos')
            ->whereHas('venta', function($query) use ($fechaInicio, $fechaFin) {
                $query->whereBetween('fecha', [$fechaInicio, $fechaFin]);
            })
            ->with('medicamento')
            ->groupBy('id_medicamento')
            ->orderBy('total_vendido', 'desc')
            ->get();

        if ($request->has('exportar') && $request->exportar == 'pdf') {
            $pdf = PDF::loadView('reportes.medicamentos_vendidos_pdf', compact('medicamentos', 'fechaInicio', 'fechaFin'));
            return $pdf->download('reporte_medicamentos_vendidos_'.now()->format('YmdHis').'.pdf');
        }

        return view('reportes.medicamentos_vendidos', compact('medicamentos', 'fechaInicio', 'fechaFin'));
    }

    public function inventario(Request $request)
    {
        $inventario = Inventario::with('medicamento')
            ->orderBy('cantidad', 'asc')
            ->get();

        if ($request->has('exportar') && $request->exportar == 'pdf') {
            $pdf = PDF::loadView('reportes.inventario_pdf', compact('inventario'));
            return $pdf->download('reporte_inventario_'.now()->format('YmdHis').'.pdf');
        }

        return view('reportes.inventario', compact('inventario'));
    }

    public function devoluciones(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $fechaFin = $request->input('fecha_fin', Carbon::now()->endOfMonth()->format('Y-m-d'));

        $devoluciones = Devolucion::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->with(['venta', 'medicamento'])
            ->orderBy('fecha', 'desc')
            ->get();

        if ($request->has('exportar') && $request->exportar == 'pdf') {
            $pdf = PDF::loadView('reportes.devoluciones_pdf', compact('devoluciones', 'fechaInicio', 'fechaFin'));
            return $pdf->download('reporte_devoluciones_'.now()->format('YmdHis').'.pdf');
        }

        return view('reportes.devoluciones', compact('devoluciones', 'fechaInicio', 'fechaFin'));
    }

    public function proveedoresMedicamentos(Request $request)
    {
        $proveedores = Proveedor::with(['medicamentos' => function($query) {
            $query->orderBy('nombre');
        }])->orderBy('nombre')->get();

        if ($request->has('exportar') && $request->exportar == 'pdf') {
            $pdf = PDF::loadView('reportes.proveedores_medicamentos_pdf', compact('proveedores'));
            return $pdf->download('reporte_proveedores_medicamentos_'.now()->format('YmdHis').'.pdf');
        }

        return view('reportes.proveedores_medicamentos', compact('proveedores'));
    }
}