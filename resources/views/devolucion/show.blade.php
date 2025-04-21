@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Devolución</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .info-box { background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .info-row { margin-bottom: 10px; }
        .info-label { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Detalle de Devolución #{{ $devolucion->id }}</h1>
    
    <div class="info-box">
        <div class="info-row">
            <span class="info-label">Venta asociada:</span>
            <span>#{{ $devolucion->id_venta }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Medicamento:</span>
            <span>{{ $devolucion->medicamento->nombre }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Cantidad devuelta:</span>
            <span>{{ $devolucion->cantidad }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Fecha:</span>
            <span>{{ date('d/m/Y H:i', strtotime($devolucion->fecha)) }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Motivo:</span>
            <span>{{ $devolucion->motivo }}</span>
        </div>
    </div>
    
    <a href="/devolucion">← Volver a la lista</a>
</body>
</html>
@endsection