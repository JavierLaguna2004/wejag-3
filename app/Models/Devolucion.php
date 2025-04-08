<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devoluciones';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_venta',
        'id_medicamento',
        'cantidad',
        'motivo',
        'fecha'
    ];
    
    public $timestamps = false;
    
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
    
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento');
    }
}