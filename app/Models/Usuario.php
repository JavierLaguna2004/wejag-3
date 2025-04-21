<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'rol',
    ];
    
    protected $hidden = [
        'password',
    ];
    
    protected $casts = [
        'rol' => 'string',
    ];
    
    // If you need timestamps, but your table doesn't have them
    public $timestamps = false;
    
    // If you want to rename the default timestamp fields
    // const CREATED_AT = 'fecha_crea_800';
    // const UPDATED_AT = 'fecha_act_800';
}