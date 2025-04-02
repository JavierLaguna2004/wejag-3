<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Cargos</h1>
    
    <form action="/cargo/{{$cargo->id}}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Codigo</label>
        <input type="text" name="codigo" id="codigo" value="{{$cargo->id}}">


        <label for="">Nombre</label>
        <input type="text" name="nombre_700" id="nombre_700" value="{{$cargo->nombre_700}}">

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>