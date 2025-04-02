<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <h1>Eliminar Oficina</h1>
    
    <form action="/oficina/{{$oficina->id}}" method="POST">
        @csrf
        @method('DELETE')
        <label for="">Codigo</label>
        <input type="text" name="codigo" id="codigo" value="{{$oficina->id}}">

        <label for="">Ciudad</label>
        <input type="text" name="ciudad_100" id="ciudad_100" value="{{$oficina->ciudad_100}}">

        <label for="">Calle</label>
        <input type="text" name="calle_100" id="calle_100" value="{{$oficina->calle_100}}">

        <label for="">Numero</label>
        <input type="text" name="numero_100" id="numero_100" value="{{$oficina->numero_100}}">

        <label for="">Codigo Postal</label>
        <input type="text" name="cod_postal_100" id="cod_postal_100" value="{{$oficina->cod_postal_100}}">

        <label for="">Telefono</label>
        <input type="text" name="telefono_100" id="telefono_100" value="{{$oficina->telefono_100}}">


        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</body>
</html>