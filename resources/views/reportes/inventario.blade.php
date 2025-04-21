@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="header-container mb-4">
        <a href="{{ route('reportes.index') }}" class="home-icon">🔙</a>
        <h1>Reporte de Inventario</h1>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h3 class="text-primary">{{ $inventario->sum('cantidad') }}</h3>
                    <p class="mb-0">Total de unidades en inventario</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h3 class="text-primary">{{ $inventario->count() }}</h3>
                    <p class="mb-0">Medicamentos diferentes</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detalle de Inventario</h5>
                <form method="GET" action="{{ route('reportes.inventario') }}">
                    <button type="submit" name="exportar" value="pdf" class="btn btn-light btn-sm">
                        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Medicamento</th>
                            <th>Proveedor</th>
                            <th class="text-end">Stock</th>
                            <th>Unidad</th>
                            <th class="text-end">Precio Unitario</th>
                            <th class="text-end">Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inventario as $item)
                        <tr>
                            <td>{{ $item->medicamento->nombre }}</td>
                            <td>{{ $item->medicamento->proveedor->nombre }}</td>
                            <td class="text-end">{{ $item->cantidad }}</td>
                            <td>{{ $item->medicamento->unidad_medida }}</td>
                            <td class="text-end">${{ number_format($item->medicamento->precio, 2) }}</td>
                            <td class="text-end">${{ number_format($item->cantidad * $item->medicamento->precio, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay registros en el inventario</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection