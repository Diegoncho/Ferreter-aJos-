<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Marcas;

class MarcaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        return view('CrudMarcas.marca');
    }
}
