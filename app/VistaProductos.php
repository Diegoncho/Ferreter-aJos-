<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaProductos extends Model
{
    public $timestaps = false;

    public $table = "vta_productos";

    protected $fillable = [
        'id', 'nombre', 'descripcion', 'marca_id', 'marca', 'categoria_id', 'categoria',
        'cantidad', 'proveedor_id', 'proveedor', 'precio_costo'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(nombre)"), "LIKE", "%$name%");
        }

    }
}
