@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="header-container mb-4">
        <a href="{{ route('reportes.index') }}" class="home-icon">🔙</a>
        <h1>Reporte de Ventas</h1>
    </div>

    <form method="GET" action="{{ route('reportes.ventas') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $fechaInicio }}">
            </div>
            <div class="col-md-3">
                <label for="fecha_fin" class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $fechaFin }}">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
            <div class="col-md-3 d-flex align-items-end justify-content-end">
                <button type="submit" name="exportar" value="pdf" class="btn btn-danger">Exportar PDF</button>
            </div>
        </div>
    </form>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Resumen de Ventas</h5>
        </div>
        <div class="card-body">
            <p><strong>Período:</strong> {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}</p>
            <p><strong>Total de ventas:</strong> {{ count($ventas) }}</p>
            <p><strong>Ingresos totales:</strong> ${{ number_format($totalVentas, 2) }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}</td>
                            <td>{{ $venta->usuario->name }}</td>
                            <td>${{ number_format($venta->total, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection