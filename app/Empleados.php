<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'nombres', 'apellidos', 'cargo_id', 'direccion', 'telefono'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(nombres, ' ' ,apellidos)"), "LIKE", "%$name%");
        }
        
    }
}
