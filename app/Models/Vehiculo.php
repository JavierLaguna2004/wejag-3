<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculo'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'codigo_200'; // Definir la clave primaria correcta

    public $incrementing = true; // Indicar que es autoincremental

    protected $keyType = 'int'; // Especificar el tipo de dato de la clave primaria

    public $timestamps = true; // Si usas created_at y updated_at

    protected $fillable = [
        'grupo_200',
        'marca_200',
        'modelo_200',
        'cant_puertas_200',
        'cant_plazas_200',
        'cap_maletero_200',
        'edad_min_200',
        'estado_200',
        'fecha_ing_200',
        'matricula_200',
        'codigo_100',
    ];
}
