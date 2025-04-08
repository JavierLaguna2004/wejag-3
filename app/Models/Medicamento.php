<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamentos';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'unidad_medida',
        'precio',
        'id_proveedor',
        'fecha_vencimiento'
    ];
    
    protected $casts = [
        'fecha_vencimiento' => 'date',
        'precio' => 'decimal:2'
    ];
    
    public $timestamps = false;
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id');
    }
}