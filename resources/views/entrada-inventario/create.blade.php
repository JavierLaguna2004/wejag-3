<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada de Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Registrar Nueva Entrada</h1>
    <form action="/entrada-inventario" method="POST">
        @csrf
        
        <label for="id_medicamento">Medicamento:</label>
        <select name="id_medicamento" id="id_medicamento" required>
            <option value="">Seleccione un medicamento</option>
            @foreach($medicamentos as $med)
                <option value="{{ $med->id }}">{{ $med->nombre }} ({{ $med->unidad_medida }})</option>
            @endforeach
        </select>

        <label for="id_proveedor">Proveedor:</label>
        <select name="id_proveedor" id="id_proveedor" required>
            <option value="">Seleccione un proveedor</option>
            @foreach($proveedores as $prov)
                <option value="{{ $prov->id }}">{{ $prov->nombre }}</option>
            @endforeach
        </select>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>

        <label for="fecha">Fecha:</label>
        <input type="datetime-local" name="fecha" id="fecha" required>

        <button type="submit">Registrar Entrada</button>
    </form>
    <a href="/entrada-inventario">← Volver</a>
</body>
</html>