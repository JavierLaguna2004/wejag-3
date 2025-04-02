<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $primaryKey = 'id_400';

    protected $fillable = [
    'id_400',
    'numero_400',
    'fecha_400',
    'dni_300',
];

public function conductor()
{
    return $this->belongsTo(Conductore::class, 'dni_300', 'dni_300');
}
public function al()
{
    return $this->belongsTo(Alquilere::class, 'dni_300', 'dni_300');
}
}
