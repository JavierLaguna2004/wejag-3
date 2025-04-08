<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Medicamento</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Crear Medicamento</h1>
    <form action="/medicamento" method="POST">
        @csrf
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required maxlength="100">

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="3"></textarea>

        <label for="unidad_medida">Unidad de Medida:</label>
        <select name="unidad_medida" id="unidad_medida" required>
            <option value="">Seleccione...</option>
            <option value="tableta">Tableta</option>
            <option value="cápsula">Cápsula</option>
            <option value="ml">Mililitros (ml)</option>
            <option value="mg">Miligramos (mg)</option>
            <option value="g">Gramos (g)</option>
        </select>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" min="0" required>

        <label for="id_proveedor">Proveedor:</label>
        <select name="id_proveedor" id="id_proveedor" required>
            <option value="">Seleccione...</option>
            @foreach($proveedores as $prov)
                <option value="{{ $prov->id }}">{{ $prov->nombre }}</option>
            @endforeach
        </select>

        <label for="fecha_vencimiento">Fecha Vencimiento:</label>
        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" required>

        <button type="submit">Guardar Medicamento</button>
    </form>
    <a href="/medicamento">← Volver</a>
</body>
</html>