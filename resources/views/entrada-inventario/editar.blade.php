<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Entrada de Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        input[readonly] { background-color: #f0f0f0; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Editar Entrada de Inventario</h1>
    <form action="/entrada-inventario/{{ $entrada->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="{{ $entrada->id }}" readonly>

        <label for="id_medicamento">Medicamento:</label>
        <select name="id_medicamento" id="id_medicamento" required>
            @foreach($medicamentos as $med)
                <option value="{{ $med->id }}" {{ $entrada->id_medicamento == $med->id ? 'selected' : '' }}>
                    {{ $med->nombre }} ({{ $med->unidad_medida }})
                </option>
            @endforeach
        </select>

        <label for="id_proveedor">Proveedor:</label>
        <select name="id_proveedor" id="id_proveedor" required>
            @foreach($proveedores as $prov)
                <option value="{{ $prov->id }}" {{ $entrada->id_proveedor == $prov->id ? 'selected' : '' }}>
                    {{ $prov->nombre }}
                </option>
            @endforeach
        </select>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" value="{{ $entrada->cantidad }}" required>

        <label for="fecha">Fecha:</label>
        <input type="datetime-local" name="fecha" id="fecha" value="{{ date('Y-m-d\TH:i', strtotime($entrada->fecha)) }}" required>

        <button type="submit">Actualizar Entrada</button>
    </form>
    <a href="/entrada-inventario">← Volver</a>
</body>
</html>