<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-size: 18px; font-weight: bold; }
        .subtitle { font-size: 14px; color: #555; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .summary { margin-top: 20px; padding: 10px; background-color: #f8f9fa; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Reporte de Ventas</div>
        <div class="subtitle">Período: {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}</div>
    </div>

    <div class="summary">
        <p><strong>Total de ventas:</strong> {{ count($ventas) }}</p>
        <p><strong>Ingresos totales:</strong> ${{ number_format($totalVentas, 2) }}</p>
    </div>

    <table class="table">
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
</body>
</html>