<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $primaryKey = 'id';


    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id', 'id');
    }

    protected $fillable = [
    'id',
    'nombre_700',
];
}
