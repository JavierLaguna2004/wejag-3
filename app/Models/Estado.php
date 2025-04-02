<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado'; 
    protected $primaryKey = 'id_900';

    public $incrementing = false;

    protected $fillable = [
    'id_900',
    'estado_900',
];
}
