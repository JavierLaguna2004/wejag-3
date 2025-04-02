<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>
</head>
<body>
    <h1>Editar Vehículo</h1>
    
    <form action="/vehiculo/{{ $vehiculo->codigo_200 }}" method="POST">
        @csrf
        @method('PUT') 
        
        <label for="codigo_200">Código:</label>
        <input type="text" name="codigo_200" id="codigo_200" value="{{ $vehiculo->codigo_200 }}" readonly>
        
        <label for="grupo_200">Grupo:</label>
        <input type="text" name="grupo_200" id="grupo_200" value="{{ $vehiculo->grupo_200 }}" required>
        
        <label for="marca_200">Marca:</label>
        <input type="text" name="marca_200" id="marca_200" value="{{ $vehiculo->marca_200 }}" required>
        
        <label for="modelo_200">Modelo:</label>
        <input type="text" name="modelo_200" id="modelo_200" value="{{ $vehiculo->modelo_200 }}" required>
        
        <label for="cant_puertas_200">Cantidad de Puertas:</label>
        <input type="number" name="cant_puertas_200" id="cant_puertas_200" value="{{ $vehiculo->cant_puertas_200 }}" required>
        
        <label for="cant_plazas_200">Cantidad de Plazas:</label>
        <input type="number" name="cant_plazas_200" id="cant_plazas_200" value="{{ $vehiculo->cant_plazas_200 }}" required>
        
        <label for="cap_maletero_200">Capacidad del Maletero:</label>
        <input type="number" name="cap_maletero_200" id="cap_maletero_200" value="{{ $vehiculo->cap_maletero_200 }}" required>
        
        <label for="edad_min_200">Edad Mínima:</label>
        <input type="number" name="edad_min_200" id="edad_min_200" value="{{ $vehiculo->edad_min_200 }}" required>
        
        <label for="estado_200">Estado:</label>
        <input type="text" name="estado_200" id="estado_200" value="{{ $vehiculo->estado_200 }}" required>
        
        <label for="fecha_ing_200">Fecha de Ingreso:</label>
        <input type="date" name="fecha_ing_200" id="fecha_ing_200" value="{{ $vehiculo->fecha_ing_200 }}" required>
        
        <label for="matricula_200">Matrícula:</label>
        <input type="text" name="matricula_200" id="matricula_200" value="{{ $vehiculo->matricula_200 }}" required>
        
        <label for="codigo_100">Código de Oficina:</label>
        <input type="text" name="codigo_100" id="codigo_100" value="{{ $vehiculo->codigo_100 }}" required>
        
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
