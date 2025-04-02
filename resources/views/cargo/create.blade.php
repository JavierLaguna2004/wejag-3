<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Crear Cargo</h1>
    <form action="/cargo" method="Post">
        @csrf
        
        <label for="">Nombre</label>
        <input type="text" name="nombre_700" id="nombre_700">


        <button type="submit">Crear Registro</button>
    </form>
</body>
</html>