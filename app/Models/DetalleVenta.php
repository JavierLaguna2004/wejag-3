<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalleventas';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_venta',
        'id_medicamento',
        'cantidad',
        'subtotal'
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