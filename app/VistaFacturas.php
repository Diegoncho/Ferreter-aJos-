<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaFacturas extends Model
{
    public $timestaps = false;

    public $table = "vta_facturas";

    protected $fillable = [
        'id', 'fecha', 'producto_id', 'producto', 'marca_id', 'marca',
        'cantidad', 'precio', 'cliente_id', 'nombres', 'apellidos', 'direccion', 'telefono'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(id, ' ' ,nombres, ' ' ,apellidos)"), "LIKE", "%$name%");
        }

    }
}
