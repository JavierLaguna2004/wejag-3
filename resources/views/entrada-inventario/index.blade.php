@extends('layouts.app')

@section('content')
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
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #3490dc;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .alert-success {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }
        .delete-btn {
            background: none;
            border: none;
            color: #e3342f;
            cursor: pointer;
            padding: 0;
            font: inherit;
        }
        .delete-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <a href="/" class="home-icon">🏠</a>
        <h1>Entradas de Inventario</h1>
    </div>

    <a href="/entrada-inventario/create" class="create-btn">Registrar Nueva Entrada</a>

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
                        <form action="/entrada-inventario/{{ $entrada->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('¿Estás seguro de eliminar esta entrada de inventario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
@endsection