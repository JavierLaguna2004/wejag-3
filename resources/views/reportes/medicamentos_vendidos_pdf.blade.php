<!DOCTYPE html>
<html>
<head>
    <title>Medicamentos Más Vendidos</title>
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
        <div class="title">Medicamentos Más Vendidos</div>
        <div class="subtitle">Farmacia - {{ now()->format('d/m/Y H:i') }}</div>
    </div>

    <div class="summary">
        <p><strong>Período:</strong> {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}</p>
        <p><strong>Total de medicamentos diferentes vendidos:</strong> {{ count($medicamentos) }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="55%">Medicamento</th>
                <th width="20%" class="text-end">Cantidad Vendida</th>
                <th width="20%" class="text-end">Total Ingresos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicamentos as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->medicamento->nombre }}</td>
                <td class="text-end">{{ $item->total_vendido }}</td>
                <td class="text-end">${{ number_format($item->total_ingresos, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Generado el {{ now()->format('d/m/Y H:i') }} | Página {PAGENO} de {nbpg}
    </div>
</body>
</html>