<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #3490dc;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .home-icon {
            font-size: 24px;
            margin-right: 20px;
            text-decoration: none;
            color: #333;
        }
        .header-container {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="header-container">
    <a href="/" class="home-icon">🏠</a>
    <h1>Lista de Usuarios</h1>
</div>

<a href="/usuario/create" style="display: inline-block; margin-bottom: 20px; padding: 8px 15px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px;">Crear Usuario</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Creado en</th>
            <th>Actualizado en</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ ucfirst($usuario->rol) }}</td>
                <td>{{ $usuario->created_at }}</td>
                <td>{{ $usuario->updated_at }}</td>
                            <td class="action-links">
                <a href="/usuario/{{ $usuario->id }}/edit">Editar</a>
                
                
                <form action="/usuario/{{ $usuario->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: #3490dc; cursor: pointer; padding: 0; font: inherit;" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')">Eliminar</button>
                </form>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Mostrar mensajes de éxito/error -->
@if(session('success'))
    <div style="margin-top: 20px; padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="margin-top: 20px; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px;">
        {{ session('error') }}
    </div>
@endif

</body>
</html>