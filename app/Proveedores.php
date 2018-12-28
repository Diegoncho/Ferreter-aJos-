<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'nombre', 'direccion', 'telefono'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(nombre)"), "LIKE", "%$name%");
        }
    }
}
