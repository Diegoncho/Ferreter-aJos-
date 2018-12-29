<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'nombres', 'apellidos', 'direccion', 'telefono', 'email'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(nombres, ' ' ,apellidos)"), "LIKE", "%$name%");
        }
        
    }
}
