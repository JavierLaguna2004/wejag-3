<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_medicamento',
        'cantidad'
    ];
    
    public $timestamps = false;
    
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento', 'id');
    }
}