<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Productos;
use App\Marcas;
use App\Categorias;
use App\Proveedores;
use App\VistaProductos;

class ProductoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaProductos = VistaProductos::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudProductos.producto', compact('VistaProductos'));
    }

    public function create(){

        $Marcas = Marcas::all();
        $Categorias = Categorias::all();
        $Proveedores = Proveedores::all();

        return view('CrudProductos.productoAdd', compact('Marcas','Categorias','Proveedores'));
    }

    public function view($id){

        $Productos = Productos::findOrFail($id);
        $VistaProductos = VistaProductos::findOrFail($id);

        return view('CrudProductos.productoView', compact('Productos','VistaProductos'));
    }

    public function edit($id){

        $Productos = Productos::findOrFail($id);
        $Marcas = Marcas::all();
        $Categorias = Categorias::all();
        $Proveedores = Proveedores::all();
        $VistaProductos = VistaProductos::findOrFail($id);

        return view('CrudProductos.productoEdit', compact('Productos','Marcas','Categorias','Proveedores','VistaProductos'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:250',
            'marca_id' => 'required',
            'categoria_id' => 'required',
            'cantidad' => 'required',
            'proveedor_id' => 'required',
            'precio_costo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/productoAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $Productos = new Productos;

            $Productos->nombre = $request->nombre;
            $Productos->descripcion = $request->descripcion;
            $Productos->marca_id = $request->marca_id;
            $Productos->categoria_id = $request->categoria_id;
            $Productos->cantidad = $request->cantidad;
            $Productos->proveedor_id = $request->proveedor_id;
            $Productos->precio_costo = $request->precio_costo;

            $Productos->save();

            \Session::flash('message-add', '¡Registro exitoso!');
            
            return redirect('/producto');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:250',
            'marca_id' => 'required',
            'categoria_id' => 'required',
            'cantidad' => 'required',
            'proveedor_id' => 'required',
            'precio_costo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/productoEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $Productos = Productos::findOrFail($id);

            $Productos->nombre = $request->nombre;
            $Productos->descripcion = $request->descripcion;
            $Productos->marca_id = $request->marca_id;
            $Productos->categoria_id = $request->categoria_id;
            $Productos->cantidad = $request->cantidad;
            $Productos->proveedor_id = $request->proveedor_id;
            $Productos->precio_costo = $request->precio_costo;

            $Productos->save();

            \Session::flash('message-edit', $Productos->nombre.' se actualizo correctamente.');

            return redirect('/producto');
    }

    public function delete($id){
        
        $Productos = Productos::findOrFail($id);

        $Productos->delete();

        \Session::flash('message-delete', $Productos->nombre.' ha sido eliminado.');

        return redirect('/producto');
    }
}
