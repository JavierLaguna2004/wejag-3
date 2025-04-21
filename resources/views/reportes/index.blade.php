@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Reportería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .report-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
            height: 100%;
        }
        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .report-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="header-container mb-5">
            <a href="/" class="home-icon">🏠</a>
            <h1 class="text-center">Módulo de Reportería</h1>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('reportes.ventas') }}" class="text-decoration-none">
                    <div class="card report-card text-center p-4">
                        <div class="report-icon">📊</div>
                        <h3>Reporte de Ventas</h3>
                        <p class="text-muted">Ventas realizadas por período</p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4">
                <a href="{{ route('reportes.medicamentos-vendidos') }}" class="text-decoration-none">
                    <div class="card report-card text-center p-4">
                        <div class="report-icon">💊</div>
                        <h3>Medicamentos Vendidos</h3>
                        <p class="text-muted">Ranking de medicamentos más vendidos</p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4">
                <a href="{{ route('reportes.inventario') }}" class="text-decoration-none">
                    <div class="card report-card text-center p-4">
                        <div class="report-icon">📦</div>
                        <h3>Inventario</h3>
                        <p class="text-muted">Stock actual de medicamentos</p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4">
                <a href="{{ route('reportes.devoluciones') }}" class="text-decoration-none">
                    <div class="card report-card text-center p-4">
                        <div class="report-icon">🔄</div>
                        <h3>Devoluciones</h3>
                        <p class="text-muted">Devoluciones realizadas</p>
                    </div>
                </a>
            </div>
            
            <!-- <div class="col-md-4">
                <a href="{{ route('reportes.proveedores-medicamentos') }}" class="text-decoration-none">
                    <div class="card report-card text-center p-4">
                        <div class="report-icon">🏢</div>
                        <h3>Proveedores</h3>
                        <p class="text-muted">Medicamentos por proveedor</p>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
</body>
</html>
@endsection