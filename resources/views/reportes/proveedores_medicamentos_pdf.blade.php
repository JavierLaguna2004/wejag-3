<!DOCTYPE html>
<html>
<head>
    <title>Proveedores y Medicamentos</title>
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
        .proveedor-title { background-color: #f8f9fa; padding: 8px; margin-top: 15px; font-weight: bold; }
        .badge { font-size: 12px; padding: 3px 6px; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Proveedores y sus Medicamentos</div>
        <div class="subtitle">Farmacia - {{ now()->format('d/m/Y H:i') }}</div>
    </div>

    <div class="summary">
        <p><strong>Total de proveedores:</strong> {{ count($proveedores) }}</p>
        <p><strong>Total de medicamentos:</strong> {{ $totalMedicamentos }}</p>
        <p><strong>Promedio por proveedor:</strong> {{ number_format($totalMedicamentos / max(count($proveedores), 1), 1) }}</p>
    </div>

    @foreach($proveedores as $proveedor)
    <div class="proveedor-section">
        <div class="proveedor-title">
            {{ $proveedor->nombre }}
            <span class="badge bg-primary">{{ $proveedor->medicamentos->count() }} medicamentos</span>
        </div>
        
        @if($proveedor->medicamentos->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="45%">Medicamento</th>
                    <th width="15%">Unidad</th>
                    <th width="20%" class="text-end">Precio</th>
                    <th width="20%" class="text-end">Vence</th>
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
        @else
        <p style="padding: 10px; background-color: #fff3cd; border-radius: 4px;">
            Este proveedor no tiene medicamentos registrados
        </p>
        @endif
    </div>

    @if(!$loop->last)
    <div class="page-break"></div>
    @endif
    @endforeach

    <div class="footer">
        Generado el {{ now()->format('d/m/Y H:i') }} | Página {PAGENO} de {nbpg}
    </div>
</body>
</html>