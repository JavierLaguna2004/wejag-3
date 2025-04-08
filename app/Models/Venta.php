<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    
    protected $primaryKey = 'id';
    protected $dates = ['fecha'];
    protected $fillable = [
        'id_usuario',
        'fecha',
        'total'
    ];
    
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta');
    }
}