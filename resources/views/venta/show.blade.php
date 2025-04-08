<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Venta</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .total { font-weight: bold; font-size: 1.2em; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Detalle de Venta #{{ $venta->id }}</h1>
    
    <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}</p>
    <p><strong>Usuario:</strong> {{ $venta->usuario->nombre }}</p>
    
    <table>
        <thead>
            <tr>
                <th>Medicamento</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->medicamento->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ number_format($detalle->subtotal / $detalle->cantidad, 2) }}</td>
                    <td>${{ number_format($detalle->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="total">Total: ${{ number_format($venta->total, 2) }}</div>
    
    <a href="/venta">Volver a la lista</a>
</body>
</html>