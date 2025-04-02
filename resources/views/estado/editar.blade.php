<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estado</title>
</head>
<body>
    <h1>Editar Estado</h1>
    
    <form action="/estado/{{ $estado->id_900 }}" method="POST">
        @csrf
        @method('PUT') 
        <label for="id_900">Código:</label>
        <input type="text" name="id_900" id="id_900" value="{{ $estado->id_900 }}" readonly>

       
        <label for="estado_900">Estado:</label>
        <input type="text" name="estado_900" id="estado_900" value="{{ $estado->estado_900 }}" required>

        
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>