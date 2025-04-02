<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
</head>
<body>

<h1>Lista de Vehículos</h1>

<a href="/vehiculo/create">Crear Vehículo</a>

<table border="1">
    <thead>
        <tr>
            <td>Código</td>
            <td>Grupo</td>
            <td>Marca</td>
            <td>Modelo</td>
            <td>Puertas</td>
            <td>Plazas</td>
            <td>Capacidad Maletero</td>
            <td>Edad Mínima</td>
            <td>Estado</td>
            <td>Fecha de Ingreso</td>
            <td>Matrícula</td>
            <td>Código Oficina</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($dvehiculo as $vehiculo)
            <tr>
                <td>{{ $vehiculo->codigo_200 }}</td>
                <td>{{ $vehiculo->grupo_200 }}</td>
                <td>{{ $vehiculo->marca_200 }}</td>
                <td>{{ $vehiculo->modelo_200 }}</td>
                <td>{{ $vehiculo->cant_puertas_200 }}</td>
                <td>{{ $vehiculo->cant_plazas_200 }}</td>
                <td>{{ $vehiculo->cap_maletero_200 }}</td>
                <td>{{ $vehiculo->edad_min_200 }}</td>
                <td>{{ $vehiculo->estado_200 }}</td>
                <td>{{ $vehiculo->fecha_ing_200 }}</td>
                <td>{{ $vehiculo->matricula_200 }}</td>
                <td>{{ $vehiculo->codigo_100 }}</td>
                <td><a href="/vehiculo/{{ $vehiculo->codigo_200 }}/edit">Editar</a></td>
                <td><a href="/vehiculoa/{{ $vehiculo->codigo_200 }}">Eliminar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>