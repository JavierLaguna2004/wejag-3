<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        input[readonly] { background-color: #f0f0f0; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Editar Proveedor</h1>
    <form action="/proveedor/{{ $proveedor->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="{{ $proveedor->id }}" readonly>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $proveedor->nombre }}" required maxlength="100">

        <label for="contacto">Contacto:</label>
        <input type="text" name="contacto" id="contacto" value="{{ $proveedor->contacto }}" required maxlength="100">

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="{{ $proveedor->telefono }}" required maxlength="20">

        <label for="direccion">Dirección:</label>
        <textarea name="direccion" id="direccion" required>{{ $proveedor->direccion }}</textarea>

        <button type="submit">Actualizar Proveedor</button>
    </form>
    <a href="/proveedor">← Volver</a>
</body>
</html>