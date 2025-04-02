<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alquiler</title>
</head>
<body>
    <h1>Eliminar Alquiler</h1>

    <form action="/alquiler/{{$alquiler->id_500}}" method="POST">
        @csrf
        @method('DELETE')

        <label for="fecha_ini_500">Fecha Inicio</label>
        <input type="text" name="fecha_ini_500" id="fecha_ini_500" value="{{$alquiler->fecha_ini_500}}" readonly>

        <label for="fecha_fin_500">Fecha Fin</label>
        <input type="text" name="fecha_fin_500" id="fecha_fin_500" value="{{$alquiler->fecha_fin_500}}" readonly>

        <label for="seguro_500">Seguro</label>
        <input type="text" name="seguro_500" id="seguro_500" value="{{$alquiler->seguro_500 ? 'Sí' : 'No'}}" readonly>

        <label for="precio_500">Precio</label>
        <input type="text" name="precio_500" id="precio_500" value="{{$alquiler->precio_500}}" readonly>

        <label for="id_400">ID Vehículo</label>
        <input type="text" name="id_400" id="id_400" value="{{$alquiler->id_400}}" readonly>

        <label for="codigo_100">Código Oficina</label>
        <input type="text" name="codigo_100" id="codigo_100" value="{{$alquiler->codigo_100}}" readonly>

        <label for="dni_300">DNI Cliente</label>
        <input type="text" name="dni_300" id="dni_300" value="{{$alquiler->dni_300}}" readonly>

        <button type="submit">Eliminar Alquiler</button>
    </form>
</body>
</html>
