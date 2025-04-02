<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Alquiler</title>
</head>
<body>
    
    <h1>Crear Alquiler</h1>
    <form action="/alquiler" method="POST">
        @csrf 
        
        <label for="fecha_ini_500">Fecha Inicio:</label>
        <input type="date" name="fecha_ini_500" id="fecha_ini_500" required>

        <label for="fecha_fin_500">Fecha Fin:</label>
        <input type="date" name="fecha_fin_500" id="fecha_fin_500" required>

        <label for="seguro_500">Seguro:</label>
        <select name="seguro_500" id="seguro_500" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>

        <label for="precio_500">Precio:</label>
        <input type="number" name="precio_500" id="precio_500" step="0.01" required>

        <label for="id_400">Referencia ID:</label>
        <input type="number" name="id_400" id="id_400" required>

        <label for="codigo_100">Código Oficina:</label>
        <input type="number" name="codigo_100" id="codigo_100" required>

        <label for="dni_300">DNI Conductor:</label>
        <input type="number" name="dni_300" id="dni_300" required>

        <button type="submit">Crear Alquiler</button>
    </form>

</body>
</html>
