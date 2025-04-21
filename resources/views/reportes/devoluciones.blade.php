@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="header-container mb-4">
        <a href="{{ route('reportes.index') }}" class="home-icon">🔙</a>
        <h1>Reporte de Devoluciones</h1>
    </div>

    <form method="GET" action="{{ route('reportes.devoluciones') }}" class="mb-4">
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
                <div class="col-md-4">
                    <p><strong>Período:</strong> {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Total de devoluciones:</strong> {{ count($devoluciones) }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Total de unidades devueltas:</strong> {{ $devoluciones->sum('cantidad') }}</p>
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
                            <th>Fecha</th>
                            <th>Venta #</th>
                            <th>Medicamento</th>
                            <th class="text-end">Cantidad</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($devoluciones as $devolucion)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($devolucion->fecha)->format('d/m/Y H:i') }}</td>
                            <td>{{ $devolucion->id_venta }}</td>
                            <td>{{ $devolucion->medicamento->nombre }}</td>
                            <td class="text-end">{{ $devolucion->cantidad }}</td>
                            <td>{{ Str::limit($devolucion->motivo, 50) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay devoluciones registradas en este período</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection