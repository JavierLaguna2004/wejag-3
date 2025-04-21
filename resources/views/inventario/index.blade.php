@extends('layouts.app')

@section('content')
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
        .low-stock { 
            background-color: #ffdddd; 
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
        <h1>Inventario de Medicamentos</h1>
    </div>

   

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
@endsection