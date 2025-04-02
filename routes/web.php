<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


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
