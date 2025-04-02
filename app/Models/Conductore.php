<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductore extends Model
{

    protected $primaryKey = 'dni_300';


    public function referencia()
    {
        return $this->hasMany(Referencia::class, 'dni_300', 'dni_300');
    }
    public function alq()
    {
        return $this->hasMany(Alquilere::class, 'dni_300', 'dni_300');
    }



    protected $fillable = [
    'dni_300',
    'nombre_300',
    'direccion_300',
    'telefono_300',
    'email_300',
];
}
