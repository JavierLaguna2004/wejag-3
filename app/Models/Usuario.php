<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{ 
    protected $primaryKey = 'id_800';


    protected $fillable = [
    'id_800',
    'nombre_800',
    'contra_800',
    'fecha_crea_800',
    'id_700',
];

public function cargo()
{
    return $this->belongsTo(Cargo::class, 'id_700', 'id_700');
}
}
