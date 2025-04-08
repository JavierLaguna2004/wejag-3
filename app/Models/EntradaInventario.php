<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntradaInventario extends Model
{
    protected $table = 'EntradasInventario';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_medicamento',
        'id_proveedor',
        'cantidad',
        'fecha'
    ];
    
    public $timestamps = false;
    
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento', 'id');
    }
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id');
    }
}