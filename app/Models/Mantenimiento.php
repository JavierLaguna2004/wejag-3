<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $primaryKey = 'id_600';


    protected $fillable = [
    'id_600',
    'fecha_man_600',
    'desc_600',
    'kilo_600',
    'fecha_prox_600',
    'codigo_100',
];

public function ofi()
{
    return $this->belongsTo(Oficina::class, 'codigo_100', 'codigo_100');
}
}
