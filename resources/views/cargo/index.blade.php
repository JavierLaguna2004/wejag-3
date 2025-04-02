<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Cargos</h1>

    <a href="/cargo/create">Crear Cargo</a>
   <table border=1>
        
        <thead>
        @foreach ($dcargo as  $cargo)
            <tr>
                <td>{{$cargo->id}}</td>
                <td>{{$cargo->nombre_700}}</td>
                <td><a href="/cargo/{{$cargo->id}}/edit">Editar</a></td>
                <td><a href="/cargoa/{{$cargo->id}}">Eliminar 1</a></td>
                <td><a href="/cargo/{{$cargo->id}}">Eliminar 2</a></td>
            </tr>
            @endforeach
                    
               
        </thead>
       
   </table>
   
</body>
</html>