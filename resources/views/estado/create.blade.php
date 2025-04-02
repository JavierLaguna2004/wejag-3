<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Estado</title>
</head>
<body>
    
    <h1>Crear Estado</h1>
    <form action="/estado" method="POST">
        @csrf 
        <label for="estado_900">Estado:</label>
        <input type="text" name="estado_900" id="estado_900" required>

       
        <button type="submit">Crear Registro</button>
    </form>
</body>
</html>