<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Medicamentos</title>
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
    <h1>Lista de Medicamentos</h1>
    <a href="/medicamento/create">Crear Medicamento</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Unidad</th>
                <th>Precio</th>
                <th>Proveedor</th>
                <th>Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $med)
                <tr>
                    <td>{{ $med->id }}</td>
                    <td>{{ $med->nombre }}</td>
                    <td>{{ $med->unidad_medida }}</td>
                    <td>${{ number_format($med->precio, 2) }}</td>
                    <td>{{ $med->proveedor->nombre }}</td>
                    <td>{{ $med->fecha_vencimiento->format('d/m/Y') }}</td>
                    <td class="action-links">
                        <a href="/medicamento/{{ $med->id }}/edit">Editar</a>
                        <a href="/medicamentoa/{{ $med->id }}">Eliminar</a>
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