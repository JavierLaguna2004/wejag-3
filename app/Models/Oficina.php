<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $primaryKey = 'id';


    public function vehiculo()
    {
        return $this->hasMany(Vehiculo::class, 'id', 'id');
    }

    public function man()
    {
        return $this->hasMany(Mantenimiento::class, 'id', 'id');
    }

    public function alquiler()
    {
        return $this->hasMany(Alquilere::class, 'id', 'id');
    }

    protected $fillable = [
    'id',
    'ciudad_100',
    'calle_100',
    'numero_100',
    'cod_postal_100',
    'telefono_100',
    'hora_ape_100',
    'hora_cie_100',
];
}
