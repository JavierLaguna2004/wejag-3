<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    // Especificar el nombre correcto de la tabla
    protected $table = 'alquiler'; 

    protected $primaryKey = 'id_500';

    public function oficina()
    {
        return $this->belongsTo(Oficina::class, 'codigo_100', 'codigo_100');
    }

    public function conductor()
    {
        return $this->belongsTo(Conductore::class, 'dni_300', 'dni_300');
    }

    public function referencia()
    {
        return $this->belongsTo(Referencia::class, 'id_400', 'id_400');
    }

    protected $fillable = [
        'fecha_ini_500',
        'fecha_fin_500',
        'seguro_500',
        'precio_500',
        'id_400',
        'codigo_100',
        'dni_300',
    ];
}
