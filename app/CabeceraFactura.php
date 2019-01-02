<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CabeceraFactura extends Model
{       
    public $table = 'cabecerafactura';
    
    protected $fillable = [
        'id', 'codigo_factura', 'fecha', 'cliente_id' 
    ];
}
