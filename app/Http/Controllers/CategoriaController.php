<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Categorias;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Categorias = Categorias::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudCategorias.categoria' , compact('Categorias'));
    }

    public function create(){
 
        return view('CrudCategorias.categoriaAdd');
    }

    public function edit($id){

        $Categorias = Categorias::findOrFail($id);

        return view('CrudCategorias.categoriaEdit', compact('Categorias'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'categoria' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/categoriaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Categorias = new Categorias;

            $Categorias->categoria = $request->categoria;
            
            $Categorias->save(); 

            \Session::flash('message-add', '¡Registro exitoso!');

            return redirect('/categoria');
    }

    
    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'categoria' => 'required|max:60',
        ]);

        if ($validator->fails()) {
            return redirect("/categoriaEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Categorias = Categorias::findOrFail($id);

            $Categorias->categoria = $request->categoria;
            
            $Categorias->save(); 

            \Session::flash('message-edit', $Categorias->categoria.' se actualizo correctamente.');

            return redirect('/categoria');
    }

    public function delete($id){
        
        $Categorias = Categorias::findOrFail($id);

        $Categorias->delete();

        \Session::flash('message-delete', $Categorias->categoria.' ha sido eliminado.');

        return redirect('/categoria');
    }
}
