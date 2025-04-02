<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <h1>Eliminar Cargos</h1>
    
    <form action="/cargo/{{$cargo->id}}" method="POST">
        @csrf
        @method('DELETE')
        <label for="">Codigo</label>
        <input type="text" name="codigo" id="codigo" value="{{$cargo->id}}">


        <label for="">Nombre</label>
        <input type="text" name="nombre_700" id="nombre_700" value="{{$cargo->nombre}}">


        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</body>
</html>