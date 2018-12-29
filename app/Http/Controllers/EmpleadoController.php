<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Empleados;
use App\Cargos;
use App\VistaEmpleados;

class EmpleadoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $Empleados = Empleados::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudEmpleados.empleado' , compact('Empleados'));
    }

    public function create(){
        
        $Cargos = Cargos::all();

        return view('CrudEmpleados.empleadoAdd', compact('Cargos'));
    }

    public function edit($id){

        $Empleados = Empleados::findOrFail($id);
        $Cargos = Cargos::all();
        $VistaEmpleados = VistaEmpleados::findOrFail($id);

        return view('CrudEmpleados.empleadoEdit', compact('Empleados','Cargos','VistaEmpleados'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'cargo_id' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return redirect('/empleadoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Empleados = new Empleados;

            $Empleados->nombres = $request->nombres;
            $Empleados->apellidos = $request->apellidos;
            $Empleados->cargo_id = $request->cargo_id;
            $Empleados->direccion = $request->direccion;
            $Empleados->telefono = $request->telefono;

            $Empleados->save();

            \Session::flash('message-add', '¡Registro exitoso!');

            return redirect('/empleado');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'cargo_id' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return redirect("/empleadoEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Empleados = Empleados::findOrFail($id);

            $Empleados->nombres = $request->nombres;
            $Empleados->apellidos = $request->apellidos;
            $Empleados->cargo_id = $request->cargo_id;
            $Empleados->direccion = $request->direccion;
            $Empleados->telefono = $request->telefono;

            $Empleados->save();

            \Session::flash('message-edit', $Empleados->nombres.' '.$Empleados->apellidos.' se actualizo correctamente.');

            return redirect('/empleado');
    }

    public function delete($id){
        
        $Empleados = Empleados::findOrFail($id);

        $Empleados->delete();

        \Session::flash('message-delete', $Empleados->nombres.' '. $Empleados->apellidos.' ha sido eliminado.');

        return redirect('/empleado');
    }
}
