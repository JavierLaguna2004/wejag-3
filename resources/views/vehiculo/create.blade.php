<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Vehículo</title>
</head>
<body>
    <h1>Crear Vehículo</h1>
    
    <form action="/vehiculo" method="POST">
        @csrf <!-- Token de seguridad para proteger el formulario -->

        <!-- Campo para el grupo -->
        <label for="grupo_200">Grupo:</label>
        <input type="text" name="grupo_200" id="grupo_200" required>

        <!-- Campo para la marca -->
        <label for="marca_200">Marca:</label>
        <input type="text" name="marca_200" id="marca_200" required>

        <!-- Campo para el modelo -->
        <label for="modelo_200">Modelo:</label>
        <input type="text" name="modelo_200" id="modelo_200" required>

        <!-- Campo para la cantidad de puertas -->
        <label for="cant_puertas_200">Cantidad de Puertas:</label>
        <input type="number" name="cant_puertas_200" id="cant_puertas_200" required>

        <!-- Campo para la cantidad de plazas -->
        <label for="cant_plazas_200">Cantidad de Plazas:</label>
        <input type="number" name="cant_plazas_200" id="cant_plazas_200" required>

        <!-- Campo para la capacidad del maletero -->
        <label for="cap_maletero_200">Capacidad del Maletero:</label>
        <input type="number" name="cap_maletero_200" id="cap_maletero_200" required>

        <!-- Campo para la edad mínima -->
        <label for="edad_min_200">Edad Mínima:</label>
        <input type="number" name="edad_min_200" id="edad_min_200" required>

        <!-- Campo para el estado -->
        <label for="estado_200">Estado:</label>
        <input type="text" name="estado_200" id="estado_200" required>

        <!-- Campo para la fecha de ingreso -->
        <label for="fecha_ing_200">Fecha de Ingreso:</label>
        <input type="date" name="fecha_ing_200" id="fecha_ing_200" required>

        <!-- Campo para la matrícula -->
        <label for="matricula_200">Matrícula:</label>
        <input type="text" name="matricula_200" id="matricula_200" required>

        <!-- Campo para el código de oficina -->
        <label for="codigo_100">Código de Oficina:</label>
        <input type="number" name="codigo_100" id="codigo_100" required>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Crear Registro</button>
    </form>
</body>
</html>