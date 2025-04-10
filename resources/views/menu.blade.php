@extends('layouts.app')

@section('title', 'Menú Principal')

@section('content')
    <div class="menu-grid">
        <!-- Módulo de Usuarios -->
        <div class="menu-card">
            <h2><i class="fas fa-users"></i> Usuarios</h2>
            <ul class="menu-links">
                <li><a href="/usuario"><i class="fas fa-list"></i> Lista de Usuarios</a></li>
                <li><a href="/usuario/create"><i class="fas fa-user-plus"></i> Crear Usuario</a></li>
            </ul>
        </div>
        
        <!-- Módulo de Proveedores -->
        <div class="menu-card">
            <h2><i class="fas fa-truck"></i> Proveedores</h2>
            <ul class="menu-links">
                <li><a href="/proveedor"><i class="fas fa-list"></i> Lista de Proveedores</a></li>
                <li><a href="/proveedor/create"><i class="fas fa-plus-circle"></i> Crear Proveedor</a></li>
            </ul>
        </div>
        
        <!-- Módulo de Medicamentos -->
        <div class="menu-card">
            <h2><i class="fas fa-pills"></i> Medicamentos</h2>
            <ul class="menu-links">
                <li><a href="/medicamento"><i class="fas fa-boxes"></i> Inventario</a></li>
                <li><a href="/medicamento/create"><i class="fas fa-plus-square"></i> Agregar Medicamento</a></li>
            </ul>
        </div>
        
        <!-- Módulo de Ventas -->
        <div class="menu-card">
            <h2><i class="fas fa-cash-register"></i> Ventas</h2>
            <ul class="menu-links">
                <li><a href="/venta"><i class="fas fa-receipt"></i> Registro de Ventas</a></li>
                <li><a href="/venta/create"><i class="fas fa-cart-plus"></i> Nueva Venta</a></li>
            </ul>
        </div>
        
        <!-- Módulo de Devoluciones -->
        <div class="menu-card">
            <h2><i class="fas fa-exchange-alt"></i> Devoluciones</h2>
            <ul class="menu-links">
                <li><a href="/devolucion"><i class="fas fa-history"></i> Historial</a></li>
                <li><a href="/devolucion/create"><i class="fas fa-undo"></i> Registrar Devolución</a></li>
            </ul>
        </div>

    <!-- Módulo de Entradas -->
    <div class="menu-card">
        <h2><i class="fas fa-arrow-down"></i> Entradas</h2>
        <ul class="menu-links">
            <li><a href="/entrada-inventario"><i class="fas fa-list"></i> Registro de Entradas</a></li>
            <li><a href="/entrada-inventario/create"><i class="fas fa-plus-circle"></i> Nueva Entrada</a></li>
        </ul>
    </div>

     <!-- Módulo de Inventario -->
     <div class="menu-card">
        <h2><i class="fas fa-boxes"></i> Inventario</h2>
        <ul class="menu-links">
            <li><a href="/inventario"><i class="fas fa-clipboard-list"></i> Stock Actual</a></li>         
        </ul>
    </div>   
</div>

    @push('styles')
    <style>
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
            display: flex;
            align-items: center;
        }
        .menu-card h2 i {
            margin-right: 10px;
        }
        .menu-links {
            list-style: none;
            padding: 0;
        }
        .menu-links li {
            margin-bottom: 8px;
        }
        .menu-links a {
            display: flex;
            align-items: center;
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
        .menu-links i {
            margin-right: 8px;
            width: 20px;
            text-align: center;
        }
    </style>
    @endpush
@endsection