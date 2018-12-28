<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Proveedores;

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Proveedores = Proveedores::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudProveedores.proveedor' , compact('Proveedores'));
    }

    public function create(){
 
        return view('CrudProveedores.proveedorAdd');
    }

    public function edit($id){

        $Proveedores = Proveedores::findOrFail($id);

        return view('CrudProveedores.proveedorEdit', compact('Proveedores'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return redirect('/proveedorAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Proveedores = new Proveedores;

            $Proveedores->nombre = $request->nombre;
            $Proveedores->direccion = $request->direccion;
            $Proveedores->telefono = $request->telefono;
            
            $Proveedores->save(); 

            \Session::flash('message-add', '¡Registro exitoso!');

            return redirect('/proveedor');
    }

    
    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return redirect("/proveedorEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Proveedores = Proveedores::findOrFail($id);

            $Proveedores->nombre = $request->nombre;
            $Proveedores->direccion = $request->direccion;
            $Proveedores->telefono = $request->telefono;
            
            $Proveedores->save(); 

            \Session::flash('message-edit', $Proveedores->nombre.' se actualizo correctamente.');

            return redirect('/proveedor');
    }

    public function delete($id){
        
        $Proveedores = Proveedores::findOrFail($id);

        $Proveedores->delete();

        \Session::flash('message-delete', $Proveedores->nombre.' ha sido eliminado.');

        return redirect('/proveedor');
    }
}
