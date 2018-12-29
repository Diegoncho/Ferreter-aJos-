<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Clientes;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Clientes = Clientes::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudClientes.cliente' , compact('Clientes'));
    }

    public function create(){
 
        return view('CrudClientes.clienteAdd');
    }

    public function edit($id){

        $Clientes = Clientes::findOrFail($id);

        return view('CrudClientes.clienteEdit', compact('Clientes'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('/clienteAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Clientes = new Clientes;

            $Clientes->nombres = $request->nombres;
            $Clientes->apellidos = $request->apellidos;
            $Clientes->direccion = $request->direccion;
            $Clientes->telefono = $request->telefono;
            $Clientes->email = $request->email;
            
            $Clientes->save(); 

            \Session::flash('message-add', '¡Registro exitoso!');

            return redirect('/cliente');
    }

    
    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect("/clienteEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Clientes = Clientes::findOrFail($id);

            $Clientes->nombres = $request->nombres;
            $Clientes->apellidos = $request->apellidos;
            $Clientes->direccion = $request->direccion;
            $Clientes->telefono = $request->telefono;
            $Clientes->email = $request->email;
            
            $Clientes->save(); 

            \Session::flash('message-edit', $Clientes->nombres.' '.$Clientes->apellidos.' se actualizo correctamente.');

            return redirect('/cliente');
    }

    public function delete($id){
        
        $Clientes = Clientes::findOrFail($id);

        $Clientes->delete();

        \Session::flash('message-delete', $Clientes->nombres.' '.$Clientes->apellidos.' ha sido eliminado.');

        return redirect('/cliente');
    }
}
