<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 15px; }
        .title { font-size: 18px; font-weight: bold; color: #2c3e50; }
        .subtitle { font-size: 14px; color: #7f8c8d; margin-bottom: 15px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table th { background-color: #3498db; color: white; text-align: left; }
        .table th, .table td { border: 1px solid #ddd; padding: 6px; }
        .table tr:nth-child(even) { background-color: #f2f2f2; }
        .summary { margin: 15px 0; padding: 10px; background-color: #ecf0f1; border-radius: 5px; }
        .text-end { text-align: right; }
        .footer { font-size: 10px; text-align: center; margin-top: 15px; color: #7f8c8d; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Reporte de Inventario</div>
        <div class="subtitle">Farmacia - {{ now()->format('d/m/Y H:i') }}</div>
    </div>

    <div class="summary">
        <div class="row">
            <div class="col">
                <p><strong>Total de unidades:</strong> {{ $inventario->sum('cantidad') }}</p>
            </div>
            <div class="col">
                <p><strong>Medicamentos diferentes:</strong> {{ $inventario->count() }}</p>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th width="25%">Medicamento</th>
                <th width="20%">Proveedor</th>
                <th width="10%" class="text-end">Stock</th>
                <th width="10%">Unidad</th>
                <th width="15%" class="text-end">Precio Unitario</th>
                <th width="20%" class="text-end">Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventario as $item)
            <tr>
                <td>{{ $item->medicamento->nombre }}</td>
                <td>{{ $item->medicamento->proveedor->nombre }}</td>
                <td class="text-end">{{ $item->cantidad }}</td>
                <td>{{ $item->medicamento->unidad_medida }}</td>
                <td class="text-end">${{ number_format($item->medicamento->precio, 2) }}</td>
                <td class="text-end">${{ number_format($item->cantidad * $item->medicamento->precio, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Generado el {{ now()->format('d/m/Y H:i') }} | Página {PAGENO} de {nbpg}
    </div>
</body>
</html>