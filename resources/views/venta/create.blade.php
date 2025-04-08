<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Venta</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, input, button { padding: 8px; width: 100%; }
        #medicamentos-container { margin-top: 20px; }
        .medicamento-item { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Nueva Venta</h1>
    
    @if(session('error'))
    <div style="color: red; margin-bottom: 15px;">
        {{ session('error') }}
    </div>
    @endif
    
    @if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/venta" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="id_usuario">Usuario:</label>
            <select name="id_usuario" id="id_usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Medicamentos:</label>
            <div id="medicamentos-container">
                <!-- Dynamic content will be added here -->
            </div>
            <button type="button" id="add-medicamento">Agregar Medicamento</button>
        </div>
        
        <button type="submit">Registrar Venta</button>
    </form>

    <script>
document.getElementById('add-medicamento').addEventListener('click', function() {
    const container = document.getElementById('medicamentos-container');
    const itemCount = container.querySelectorAll('.medicamento-item').length;
    
    const div = document.createElement('div');
    div.className = 'medicamento-item';
    div.innerHTML = `
        <div class="form-group">
            <label>Medicamento:</label>
            <select name="medicamentos[${itemCount}][id]" required>
                <option value="">Seleccione un medicamento</option>
                @foreach($medicamentos as $med)
                    <option value="{{ $med->id }}" data-precio="{{ $med->precio }}">
                        {{ $med->nombre }} - ${{ number_format($med->precio, 2) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Cantidad:</label>
            <input type="number" name="medicamentos[${itemCount}][cantidad]" min="1" value="1" required>
        </div>
        <button type="button" class="remove-medicamento">Eliminar</button>
    `;
    container.appendChild(div);
    
    div.querySelector('.remove-medicamento').addEventListener('click', function() {
        container.removeChild(div);
        // Reindexar los elementos restantes
        reindexMedicamentos();
    });
});

function reindexMedicamentos() {
    const container = document.getElementById('medicamentos-container');
    const items = container.querySelectorAll('.medicamento-item');
    
    items.forEach((item, index) => {
        item.querySelector('select').name = `medicamentos[${index}][id]`;
        item.querySelector('input[type="number"]').name = `medicamentos[${index}][cantidad]`;
    });
}
    </script>
</body>
</html>