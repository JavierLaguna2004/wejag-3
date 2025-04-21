@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="header-container mb-4">
        <a href="{{ route('reportes.index') }}" class="home-icon">🔙</a>
        <h1>Medicamentos Más Vendidos</h1>
    </div>

    <form method="GET" action="{{ route('reportes.medicamentos-vendidos') }}" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $fechaInicio }}" required>
            </div>
            <div class="col-md-3">
                <label for="fecha_fin" class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $fechaFin }}" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
            <div class="col-md-3">
                <button type="submit" name="exportar" value="pdf" class="btn btn-danger w-100">
                    <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
                </button>
            </div>
        </div>
    </form>

    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Resumen del Período</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Período:</strong> {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Total de medicamentos diferentes vendidos:</strong> {{ count($medicamentos) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Medicamento</th>
                            <th class="text-end">Cantidad Vendida</th>
                            <th class="text-end">Total Ingresos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medicamentos as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->medicamento->nombre }}</td>
                            <td class="text-end">{{ $item->total_vendido }}</td>
                            <td class="text-end">${{ number_format($item->total_ingresos, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay ventas de medicamentos en este período</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection