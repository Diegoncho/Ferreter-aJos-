<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public $timestaps = false;

    protected $fillable = [
        'id', 'categoria'
    ];

    public function scopeName($query, $name)
    {
        if (trim($name) != ""){

            $query->where(\DB::raw("CONCAT(categoria)"), "LIKE", "%$name%");
        }

    }
}
