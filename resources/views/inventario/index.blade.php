<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Medicamentos</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        tr:hover { background-color: #f5f5f5; }
        .action-links a { margin-right: 10px; text-decoration: none; color: #3490dc; }
        .action-links a:hover { text-decoration: underline; }
        .low-stock { background-color: #ffdddd; }
    </style>
</head>
<body>
    <h1>Inventario de Medicamentos</h1>
    <a href="/inventario/create">Agregar al Inventario</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Medicamento</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventario as $item)
                <tr class="{{ $item->cantidad < 10 ? 'low-stock' : '' }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->medicamento->nombre }}</td>
                    <td>{{ $item->medicamento->unidad_medida }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td class="action-links">
                        <a href="/inventario/{{ $item->id }}/edit">Editar</a>
                        <a href="/inventarioa/{{ $item->id }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(session('success'))
        <div style="margin-top: 20px; padding: 10px; background-color: #d4edda; color: #155724;">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>