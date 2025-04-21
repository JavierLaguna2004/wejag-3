@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        tr:hover { background-color: #f5f5f5; }
        .action-links a { margin-right: 10px; text-decoration: none; color: #3490dc; }
        .action-links a:hover { text-decoration: underline; }
        .home-icon {
            font-size: 24px;
            margin-right: 20px;
            text-decoration: none;
            color: #333;
        }
        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .create-btn {
            display: inline-block;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .create-btn:hover {
            background-color: #45a049;
        }
        .alert-success {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <a href="/" class="home-icon">🏠</a>
        <h1>Lista de Proveedores</h1>
    </div>

    <a href="/proveedor/create" class="create-btn">Crear Proveedor</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->contacto }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td class="action-links">
                        <a href="/proveedor/{{ $proveedor->id }}/edit">Editar</a>
                        <a href="/proveedora/{{ $proveedor->id }}">Eliminar</a>
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
@endsection