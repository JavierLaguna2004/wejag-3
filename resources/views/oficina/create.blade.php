<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Crear Oficina</h1>
    <form action="/oficina" method="Post">
        @csrf
        

        <label for="">Ciudad</label>
        <input type="text" name="ciudad_100" id="ciudad_100" >

        <label for="">Calle</label>
        <input type="text" name="calle_100" id="calle_100" >

        <label for="">Numero</label>
        <input type="text" name="numero_100" id="numero_100">

        <label for="">Codigo Postal</label>
        <input type="text" name="cod_postal_100" id="cod_postal_100" >

        <label for="">Telefono</label>
        <input type="text" name="telefono_100" id="telefono_100" >


        <button type="submit">Crear Registro</button>
    </form>
</body>
</html>