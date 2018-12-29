<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaEmpleados extends Model
{
    public $timestaps = false;

    public $table = "vta_empleados";

    protected $fillable = [
        'id', 'nombres', 'apellidos', 'cargo_id', 'direccion', 'telefono'
    ];
}
