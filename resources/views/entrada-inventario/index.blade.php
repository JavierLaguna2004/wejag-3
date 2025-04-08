<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas de Inventario</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        tr:hover { background-color: #f5f5f5; }
        .action-links a { margin-right: 10px; text-decoration: none; color: #3490dc; }
        .action-links a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Entradas de Inventario</h1>
    <a href="/entrada-inventario/create">Registrar Nueva Entrada</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Medicamento</th>
                <th>Proveedor</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->id }}</td>
                    <td>{{ $entrada->medicamento->nombre }}</td>
                    <td>{{ $entrada->proveedor->nombre }}</td>
                    <td>{{ $entrada->cantidad }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($entrada->fecha)) }}</td>
                    <td class="action-links">
                        <a href="/entrada-inventario/{{ $entrada->id }}/edit">Editar</a>
                        <a href="/entrada-inventarioa/{{ $entrada->id }}">Eliminar</a>
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