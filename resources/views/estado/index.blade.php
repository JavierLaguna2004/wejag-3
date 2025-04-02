<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estados</title>
</head>
<body>

<h1>Lista de Estados</h1>

<a href="/estado/create">Crear Estado</a>

<table border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>Estado</td>
            <td>Creado en</td>
            <td>Actualizado en</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($destado as $estado)
            <tr>
                <td>{{ $estado->id_900 }}</td>
                <td>{{ $estado->estado_900 }}</td>
                <td>{{ $estado->created_at }}</td>
                <td>{{ $estado->updated_at }}</td>
                <td><a href="/estado/{{ $estado->id_900 }}/edit">Editar</a></td>
                <td><a href="/estadoa/{{ $estado->id_900 }}">Eliminar</a></td>
              
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>