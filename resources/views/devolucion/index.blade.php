<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Devoluciones</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .action-links a { margin-right: 10px; text-decoration: none; color: #3490dc; }
        .action-links a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Lista de Devoluciones</h1>
    <a href="/devolucion/create">Registrar Devolución</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Venta</th>
                <th>Medicamento</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devoluciones as $devolucion)
                <tr>
                    <td>{{ $devolucion->id }}</td>
                    <td>Venta #{{ $devolucion->id_venta }}</td>
                    <td>{{ $devolucion->medicamento->nombre }}</td>
                    <td>{{ $devolucion->cantidad }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($devolucion->fecha)) }}</td>
                    <td class="action-links">
                        <a href="/devoluciona/{{ $devolucion->id }}">Ver</a>
                        <form action="/devolucion/{{ $devolucion->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
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