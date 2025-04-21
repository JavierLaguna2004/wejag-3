@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="header-container mb-4">
        <a href="{{ route('reportes.index') }}" class="home-icon">🔙</a>
        <h1>Proveedores y sus Medicamentos</h1>
    </div>

    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Resumen General</h5>
                <form method="GET" action="{{ route('reportes.proveedores-medicamentos') }}">
                    <button type="submit" name="exportar" value="pdf" class="btn btn-light btn-sm">
                        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Total de proveedores:</strong> {{ count($proveedores) }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Total de medicamentos:</strong> {{ $totalMedicamentos }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Promedio por proveedor:</strong> {{ number_format($totalMedicamentos / max(count($proveedores), 1), 1) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            @foreach($proveedores as $proveedor)
            <div class="proveedor-section mb-4">
                <h5 class="mb-3 px-3 pt-3">
                    {{ $proveedor->nombre }}
                    <span class="badge bg-primary">{{ $proveedor->medicamentos->count() }} medicamentos</span>
                </h5>
                
                @if($proveedor->medicamentos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-4">
                        <thead class="table-light">
                            <tr>
                                <th>Medicamento</th>
                                <th>Unidad</th>
                                <th class="text-end">Precio</th>
                                <th class="text-end">Vence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedor->medicamentos as $medicamento)
                            <tr>
                                <td>{{ $medicamento->nombre }}</td>
                                <td>{{ $medicamento->unidad_medida }}</td>
                                <td class="text-end">${{ number_format($medicamento->precio, 2) }}</td>
                                <td class="text-end">{{ \Carbon\Carbon::parse($medicamento->fecha_vencimiento)->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-warning mx-3">
                    Este proveedor no tiene medicamentos registrados
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection