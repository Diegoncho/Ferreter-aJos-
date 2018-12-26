<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Marcas;

class MarcaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Marcas = Marcas::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudMarcas.marca' , compact('Marcas'));
    }
}
