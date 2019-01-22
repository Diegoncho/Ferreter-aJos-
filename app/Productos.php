<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'nombre', 'descripcion', 'marca_id', 'categoria_id', 'cantidad',
        'proveedor_id', 'precio_costo', 'precio_venta'
    ];
}
