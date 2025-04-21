@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medicamento</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        input[readonly] { background-color: #f0f0f0; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Editar Medicamento</h1>
    <form action="/medicamento/{{ $medicamento->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="{{ $medicamento->id }}" readonly>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $medicamento->nombre }}" required maxlength="100">

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="3">{{ $medicamento->descripcion }}</textarea>

        <label for="unidad_medida">Unidad de Medida:</label>
        <select name="unidad_medida" id="unidad_medida" required>
            <option value="tableta" {{ $medicamento->unidad_medida == 'tableta' ? 'selected' : '' }}>Tableta</option>
            <option value="cápsula" {{ $medicamento->unidad_medida == 'cápsula' ? 'selected' : '' }}>Cápsula</option>
            <option value="ml" {{ $medicamento->unidad_medida == 'ml' ? 'selected' : '' }}>Mililitros (ml)</option>
            <option value="mg" {{ $medicamento->unidad_medida == 'mg' ? 'selected' : '' }}>Miligramos (mg)</option>
            <option value="g" {{ $medicamento->unidad_medida == 'g' ? 'selected' : '' }}>Gramos (g)</option>
        </select>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" min="0" value="{{ $medicamento->precio }}" required>

        <label for="id_proveedor">Proveedor:</label>
        <select name="id_proveedor" id="id_proveedor" required>
            @foreach($proveedores as $prov)
                <option value="{{ $prov->id }}" {{ $medicamento->id_proveedor == $prov->id ? 'selected' : '' }}>
                    {{ $prov->nombre }}
                </option>
            @endforeach
        </select>

        <label for="fecha_vencimiento">Fecha Vencimiento:</label>
        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" value="{{ $medicamento->fecha_vencimiento->format('Y-m-d') }}" required>

        <button type="submit">Actualizar Medicamento</button>
    </form>
    <a href="/medicamento">← Volver</a>
</body>
</html>
@endsection