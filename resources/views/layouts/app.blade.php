<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Farmacia App</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            background-color: #f5f5f5;
        }
        
        /* Sidebar/Navbar */
        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            height: 100vh;
            padding: 20px 0;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid #34495e;
            text-align: center;
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        
        .sidebar-nav li a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-nav li a:hover,
        .sidebar-nav li.active a {
            background: #3498db;
        }
        
        .sidebar-nav i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Contenido principal */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }
        
        /* Header del contenido */
        .content-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @stack('styles')
</head>
<body>
    <!-- Barra lateral de navegación -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-clinic-medical"></i> Farmacia App</h2>
        </div>
        <ul class="sidebar-nav">
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="/"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="{{ request()->is('usuario*') ? 'active' : '' }}">
                <a href="/usuario"><i class="fas fa-users"></i> Usuarios</a>
            </li>
            <li class="{{ request()->is('proveedor*') ? 'active' : '' }}">
                <a href="/proveedor"><i class="fas fa-truck"></i> Proveedores</a>
            </li>
            <li class="{{ request()->is('medicamento*') ? 'active' : '' }}">
                <a href="/medicamento"><i class="fas fa-pills"></i> Medicamentos</a>
            </li>
            <li class="{{ request()->is('venta*') ? 'active' : '' }}">
                <a href="/venta"><i class="fas fa-cash-register"></i> Ventas</a>
            </li>
            <li class="{{ request()->is('devolucion*') ? 'active' : '' }}">
                <a href="/devolucion"><i class="fas fa-exchange-alt"></i> Devoluciones</a>
            </li>
            <li class="{{ request()->is('entrada-inventario*') ? 'active' : '' }}">
        <a href="/entrada-inventario"><i class="fas fa-arrow-down"></i> Entradas</a>
    </li>
    <li class="{{ request()->is('inventario*') ? 'active' : '' }}">
        <a href="/inventario"><i class="fas fa-boxes"></i> Inventario</a>
    </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="content-header">
            <h1>@yield('title')</h1>
        </div>
        
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>