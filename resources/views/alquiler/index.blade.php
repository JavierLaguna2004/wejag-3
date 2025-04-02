<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alquileres</title>
</head>
<body>

<h1>Lista de Alquileres</h1>

<a href="/alquiler/create">Crear Alquiler</a>

<table border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>Fecha Inicio</td>
            <td>Fecha Fin</td>
            <td>Seguro</td>
            <td>Precio</td>
            <td>ID Vehículo</td>
            <td>Código Oficina</td>
            <td>DNI Cliente</td>
            <td>Creado en</td>
            <td>Actualizado en</td>

        </tr>
    </thead>

    <tbody>
        @foreach ($alquileres as $alquiler)
            <tr>
                <td>{{ $alquiler->id_500 }}</td>
                <td>{{ $alquiler->fecha_ini_500 }}</td>
                <td>{{ $alquiler->fecha_fin_500 }}</td>
                <td>{{ $alquiler->seguro_500 ? 'Sí' : 'No' }}</td>
                <td>{{ $alquiler->precio_500 }}</td>
                <td>{{ $alquiler->id_400 }}</td>
                <td>{{ $alquiler->codigo_100 }}</td>
                <td>{{ $alquiler->dni_300 }}</td>
                <td>{{ $alquiler->created_at }}</td>
                <td>{{ $alquiler->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
