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

    public function create(){
 
        return view('CrudMarcas.marcaAdd');
    }

    public function edit($id){

        $Marcas = Marcas::findOrFail($id);

        return view('CrudMarcas.marcaEdit', compact('Marcas'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'marca' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/marcaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Marcas = new Marcas;

            $Marcas->marca = $request->marca;
            
            $Marcas->save(); 

            \Session::flash('message-add', '¡Registro exitoso!');

            return redirect('/marca');
    }

    
    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'marca' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect("/marcaEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Marcas = Marcas::findOrFail($id);

            $Marcas->marca = $request->marca;
            
            $Marcas->save(); 

            \Session::flash('message-edit', $Marcas->marca.' se actualizo correctamente.');

            return redirect('/marca');
    }

    public function delete($id){
        
        $Marcas = Marcas::findOrFail($id);

        $Marcas->delete();

        \Session::flash('message-delete', $Marcas->marca.' ha sido eliminado.');

        return redirect('/marca');
    }
}
