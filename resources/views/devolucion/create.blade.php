<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Devolución</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, input, textarea, button { padding: 8px; width: 100%; }
        textarea { min-height: 100px; }
    </style>
</head>
<body>
    <h1>Registrar Devolución</h1>
    <form action="/devolucion" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="id_venta">Venta:</label>
            <select name="id_venta" id="id_venta" required onchange="window.location.href='/devolucion/create/'+this.value">
    <option value="">Seleccione una venta</option>
    @foreach($ventas as $venta)
        <option value="{{ $venta->id }}" {{ $venta_id == $venta->id ? 'selected' : '' }}>
            Venta #{{ $venta->id }} - {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y') }}
        </option>
    @endforeach
</select>
        </div>
        
        @if($venta_id)
        <div class="form-group">
            <label for="id_medicamento">Medicamento:</label>
<select name="id_medicamento" id="id_medicamento" required>
    <option value="">Seleccione un medicamento</option>
    @foreach($medicamentos as $medicamento)
        <option value="{{ $medicamento->id }}">
            {{ $medicamento->nombre }} 
            @isset($medicamento->pivot->cantidad)
                ({{ $medicamento->pivot->cantidad }} vendidos)
            @endisset
        </option>
    @endforeach
</select>
        </div>
        @endif
        
        <div class="form-group">
            <label for="cantidad">Cantidad a devolver:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" required>
        </div>
        
        <div class="form-group">
            <label for="motivo">Motivo:</label>
            <textarea name="motivo" id="motivo" required></textarea>
        </div>
        
        <button type="submit">Registrar Devolución</button>
    </form>
    <a href="/devolucion">← Volver</a>
</body>
</html>