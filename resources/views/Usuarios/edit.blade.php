@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[readonly] {
            background-color: #f0f0f0;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <h1>Editar Usuario</h1>
    
    <form action="/usuario/{{ $usuario->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="{{ $usuario->id }}" readonly>
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $usuario->nombre }}" required maxlength="100">
        
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" id="correo" value="{{ $usuario->correo }}" required maxlength="100">
        
        <label for="password">Nueva Contraseña (dejar en blanco para no cambiar):</label>
        <input type="password" name="password" id="password" minlength="8">
        
        <label for="rol">Rol:</label>
        <select name="rol" id="rol" required>
            <option value="basico" {{ $usuario->rol == 'basico' ? 'selected' : '' }}>Básico</option>
            <option value="root" {{ $usuario->rol == 'root' ? 'selected' : '' }}>Root</option>
        </select>
        
        <button type="submit">Actualizar Usuario</button>
    </form>
    
    <a href="/usuario" class="back-link">← Volver a la lista de usuarios</a>

</body>
</html>
@endsection