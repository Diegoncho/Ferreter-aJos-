<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Cargos;

class CargoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Cargos = Cargos::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudCargos.cargo' , compact('Cargos'));
    }

    public function create(){
 
        return view('CrudCargos.cargoAdd');
    }

    public function edit($id){

        $Cargos = Cargos::findOrFail($id);

        return view('CrudCargos.cargoEdit', compact('Cargos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'cargo' => 'required|max:60',
        ]);

        if ($validator->fails()) {
            return redirect('/cargoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Cargos = new Cargos;

            $Cargos->cargo = $request->cargo;
            
            $Cargos->save(); 

            \Session::flash('message-add', '¡Registro exitoso!');

            return redirect('/cargo');
    }

    
    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'cargo' => 'required|max:60',
        ]);

        if ($validator->fails()) {
            return redirect("/cargoEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Cargos = Cargos::findOrFail($id);

            $Cargos->cargo = $request->cargo;
            
            $Cargos->save(); 

            \Session::flash('message-edit', $Cargos->cargo.' se actualizo correctamente.');

            return redirect('/cargo');
    }

    public function delete($id){
        
        $Cargos = Cargos::findOrFail($id);

        $Cargos->delete();

        \Session::flash('message-delete', $Cargos->cargo.' ha sido eliminado.');

        return redirect('/cargo');
    }
}
