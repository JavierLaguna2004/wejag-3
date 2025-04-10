<?php

use Illuminate\Support\Facades\Route;




Route::resource('/cargo','App\Http\Controllers\CargoController');

Route::get('/cargoc/{x}','App\Http\Controllers\CargoController@create');

Route::get('/cargoa/{x}','App\Http\Controllers\CargoController@eliminar');


Route::resource('/oficina','App\Http\Controllers\OficinaController');

Route::get('/oficinac/{x}','App\Http\Controllers\OficinaController@create');

Route::get('/oficinaa/{x}','App\Http\Controllers\OficinaController@eliminar');


// Rutas para Estado
Route::resource('/estado', 'App\Http\Controllers\EstadoController');

Route::get('/estadoc/{x}', 'App\Http\Controllers\EstadoController@create');

Route::get('/estadoa/{x}', 'App\Http\Controllers\EstadoController@eliminar');


Route::resource('/vehiculo', 'App\Http\Controllers\VehiculoController');
Route::get('/vehiculoc/{x}', 'App\Http\Controllers\VehiculoController@create');
Route::get('/vehiculoa/{x}', 'App\Http\Controllers\VehiculoController@eliminar');



Route::resource('/alquiler', 'App\Http\Controllers\AlquilerController');

Route::get('/alquilerc/{x}', 'App\Http\Controllers\AlquilerController@create');

Route::get('/alquilera/{x}', 'App\Http\Controllers\AlquilerController@eliminar');



// Rutas para Usuario
Route::resource('/usuario', 'App\Http\Controllers\UsuarioController');

Route::get('/usuarioc/{x}', 'App\Http\Controllers\UsuarioController@create');

Route::delete('/usuario/{usuario}', 'App\Http\Controllers\UsuarioController@destroy')->name('usuario.destroy');



Route::resource('/proveedor', 'App\Http\Controllers\ProveedorController');
Route::get('/proveedorc/{x}', 'App\Http\Controllers\ProveedorController@create');
Route::get('/proveedora/{x}', 'App\Http\Controllers\ProveedorController@eliminar');


Route::resource('/medicamento', 'App\Http\Controllers\MedicamentoController');
Route::get('/medicamentoc/{x}', 'App\Http\Controllers\MedicamentoController@create');
Route::get('/medicamentoa/{x}', 'App\Http\Controllers\MedicamentoController@eliminar');


Route::resource('/entrada-inventario', 'App\Http\Controllers\EntradaInventarioController');
Route::get('/entrada-inventarioc/{x}', 'App\Http\Controllers\EntradaInventarioController@create');
Route::get('/entrada-inventarioa/{x}', 'App\Http\Controllers\EntradaInventarioController@eliminar');


Route::resource('/inventario', 'App\Http\Controllers\InventarioController');
Route::get('/inventarioc/{x}', 'App\Http\Controllers\InventarioController@create');
Route::get('/inventarioa/{x}', 'App\Http\Controllers\InventarioController@eliminar');

Route::resource('/venta', 'App\Http\Controllers\VentaController');
Route::get('/ventac/{x}', 'App\Http\Controllers\VentaController@create');
Route::get('/ventaa/{x}', 'App\Http\Controllers\VentaController@show');
Route::post('/venta', 'App\Http\Controllers\VentaController@store')->name('venta.store');

Route::resource('/devolucion', 'App\Http\Controllers\DevolucionController');
Route::get('/devolucion/create/{venta_id?}', 'App\Http\Controllers\DevolucionController@create');
Route::get('/devoluciona/{id}', 'App\Http\Controllers\DevolucionController@show');
Route::post('/devolucion', 'App\Http\Controllers\DevolucionController@store')->name('devolucion.store');

Route::get('/api/ventas/{venta}/medicamentos', function(Venta $venta) {
    return $venta->detalles->map(function($detalle) {
        return [
            'id' => $detalle->medicamento->id,
            'nombre' => $detalle->medicamento->nombre,
            'pivot' => [
                'cantidad' => $detalle->cantidad
            ]
        ];
    });
});

//-Route::get('/menu', [MenuController::class, 'index'])->name('menu.principal');

// Or this alternative syntax:
Route::get('/', 'App\Http\Controllers\MenuController@index')->name('menu.principal');