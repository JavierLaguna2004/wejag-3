<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Estado</title>
</head>
<body>
    <h1>Eliminar Estado</h1>
    
    <form action="/estado/{{ $estado->id_900 }}" method="POST">
        @csrf <!-- Token de seguridad para proteger el formulario -->
        @method('DELETE') <!-- Método HTTP para eliminar el registro -->

        <!-- Campo para el ID del estado (solo lectura) -->
        <label for="id_900">Código:</label>
        <input type="text" name="id_900" id="id_900" value="{{ $estado->id_900 }}" readonly>

        <!-- Campo para el nombre del estado (solo lectura) -->
        <label for="estado_900">Estado:</label>
        <input type="text" name="estado_900" id="estado_900" value="{{ $estado->estado_900 }}" readonly>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Eliminar Estado</button>
    </form>
</body>
</html>