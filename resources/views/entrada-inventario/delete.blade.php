<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Entrada de Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .confirmation-box { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        .buttons { margin-top: 20px; }
        .btn { padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
    </style>
</head>
<body>
    <h1>Confirmar Eliminación</h1>
    <div class="confirmation-box">
        <p>¿Está seguro que desea eliminar esta entrada de inventario?</p>
        <p><strong>Medicamento:</strong> {{ $entrada->medicamento->nombre }}</p>
        <p><strong>Proveedor:</strong> {{ $entrada->proveedor->nombre }}</p>
        <p><strong>Cantidad:</strong> {{ $entrada->cantidad }}</p>
        <p><strong>Fecha:</strong> {{ date('d/m/Y H:i', strtotime($entrada->fecha)) }}</p>
        
        <div class="buttons">
            <form action="/entrada-inventario/{{ $entrada->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <a href="/entrada-inventario" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</body>
</html>