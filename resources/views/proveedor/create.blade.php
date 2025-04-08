<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proveedor</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Crear Proveedor</h1>
    <form action="/proveedor" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required maxlength="100">

        <label for="contacto">Contacto:</label>
        <input type="text" name="contacto" id="contacto" required maxlength="100">

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required maxlength="20">

        <label for="direccion">Dirección:</label>
        <textarea name="direccion" id="direccion" required></textarea>

        <button type="submit">Guardar Proveedor</button>
    </form>
    <a href="/proveedor">← Volver</a>
</body>
</html>