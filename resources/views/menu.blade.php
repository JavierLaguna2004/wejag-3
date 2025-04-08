<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Sistema Farmacia</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .menu-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .menu-card h2 {
            color: #3490dc;
            margin-top: 0;
            border-bottom: 2px solid #3490dc;
            padding-bottom: 10px;
        }
        .menu-links {
            list-style: none;
            padding: 0;
        }
        .menu-links li {
            margin-bottom: 8px;
        }
        .menu-links a {
            display: block;
            padding: 8px 12px;
            background: #f8f9fa;
            border-radius: 4px;
            color: #2c3e50;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .menu-links a:hover {
            background: #3490dc;
            color: white;
        }
        .header {
            background: #3490dc;
            color: white;
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sistema de Gestión Farmacéutica</h1>
        </div>
        
        <div class="menu-grid">
            <!-- Módulo de Usuarios -->
            <div class="menu-card">
                <h2>Usuarios</h2>
                <ul class="menu-links">
                    <li><a href="/usuario">Lista de Usuarios</a></li>
                    <li><a href="/usuario/create">Crear Usuario</a></li>
                </ul>
            </div>
            
            <!-- Módulo de Proveedores -->
            <div class="menu-card">
                <h2>Proveedores</h2>
                <ul class="menu-links">
                    <li><a href="/proveedor">Lista de Proveedores</a></li>
                    <li><a href="/proveedor/create">Crear Proveedor</a></li>
                </ul>
            </div>
            
            <!-- Módulo de Medicamentos -->
            <div class="menu-card">
                <h2>Medicamentos</h2>
                <ul class="menu-links">
                    <li><a href="/medicamento">Inventario</a></li>
                    <li><a href="/medicamento/create">Agregar Medicamento</a></li>
                </ul>
            </div>
            
            <!-- Módulo de Ventas -->
            <div class="menu-card">
                <h2>Ventas</h2>
                <ul class="menu-links">
                    <li><a href="/venta">Registro de Ventas</a></li>
                    <li><a href="/venta/create">Nueva Venta</a></li>
                </ul>
            </div>
            
            <!-- Módulo de Devoluciones -->
            <div class="menu-card">
                <h2>Devoluciones</h2>
                <ul class="menu-links">
                    <li><a href="/devolucion">Historial</a></li>
                    <li><a href="/devolucion/create">Registrar Devolución</a></li>
                </ul>
            </div>
            
            <!-- Módulo de Reportes -->
            <div class="menu-card">
                <h2>Reportes</h2>
                <ul class="menu-links">
                    <li><a href="#">Ventas por Período</a></li>
                    <li><a href="#">Inventario Bajo</a></li>
                    <li><a href="#">Productos Más Vendidos</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>