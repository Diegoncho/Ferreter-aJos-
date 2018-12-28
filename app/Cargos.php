<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'cargo'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(cargo)"), "LIKE", "%$name%");
        }
    }
}
