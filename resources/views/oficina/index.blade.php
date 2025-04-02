<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Oficinas</h1>

    <a href="/oficina/create">Crear Oficinas</a>
   <table border=1>
        
        <thead>
        @foreach ($doficina as  $oficina)
            <tr>
                <td>{{$oficina->id}}</td>
                <td>{{$oficina->ciudad_100}}</td>
                <td>{{$oficina->calle_100}}</td>
                <td>{{$oficina->numero_100}}</td>
                <td>{{$oficina->cod_postal_100}}</td>
                <td>{{$oficina->telefono_100}}</td>
                <td><a href="/oficina/{{$oficina->id}}/edit">Editar</a></td>
                <td><a href="/oficinaa/{{$oficina->id}}">Eliminar 1</a></td>
                <td><a href="/oficina/{{$oficina->id}}">Eliminar 2</a></td>
            </tr>
            @endforeach
                    
               
        </thead>
       
   </table>
   
</body>
</html>