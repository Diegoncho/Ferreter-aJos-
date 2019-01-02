<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\CabeceraFactura;
use App\DetalleFactura;
use App\Productos;
use App\Clientes;
use App\VistaFacturas;
use App\VistaProductos;

class FacturaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $VistaFacturas = VistaFacturas::name($request->get('name'))->orderby('id','ASC')->paginate(7);

        return view('CrudFacturas.factura', compact('VistaFacturas'));
    }

    public function getProducto($id){
        
        $VistaProductos = VistaProductos::FindOrFail($id);

        return $VistaProductos->only('marca');
    }
    
    public function getCliente($id){
        
        $Clientes = Clientes::FindOrFail($id);

        return $Clientes->only('direccion', 'telefono');
    }

    public function create(){

        $Productos = Productos::all();
        $Clientes = Clientes::all();
 
        return view('CrudFacturas.facturaAdd', compact('Productos','Clientes'));
    }

    public function edit($id){

        $CabeceraFactura = CabeceraFactura::findOrFail($id);
        $DetalleFactura = DetalleFactura::findOrFail($id);
        $Productos = Productos::all();
        $Clientes = Clientes::all();
        $VistaFacturas = VistaFacturas::findOrFail($id);

        return view('CrudFacturas.facturaEdit', compact('CabeceraFactura','DetalleFactura','Productos','Clientes','VistaFacturas'));
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'codigo_factura' => 'required|max:100',
            'fecha' => 'required|date',
            'cliente_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/facturaAdd')
            ->withInput()
            ->withErrors($validator);
        }

            $CabeceraFactura = new CabeceraFactura;

            $CabeceraFactura->codigo_factura = $request->codigo_factura;
            $CabeceraFactura->fecha = $request->fecha;
            $CabeceraFactura->cliente_id = $request->cliente_id;
            
            $CabeceraFactura->save(); 

            $DetalleFactura = new DetalleFactura;

            $DetalleFactura->producto_id = $request->producto_id;
            $DetalleFactura->factura_id = $CabeceraFactura->id;
            $DetalleFactura->cantidad = $request->cantidad;
            $DetalleFactura->precio = $request->precio;

            $DetalleFactura->save(); 

            \Session::flash('message-add', '¡Registro exitoso!');

            return redirect('/factura');
    }

    public function put(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'codigo_factura' => 'required|max:100',
            'fecha' => 'required|date',
            'cliente_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/facturaEdit/$id")
            ->withInput()
            ->withErrors($validator);
        }

            $CabeceraFactura = CabeceraFactura::findOrFail($id);

            $CabeceraFactura->codigo_factura = $request->codigo_factura;
            $CabeceraFactura->fecha = $request->fecha;
            $CabeceraFactura->cliente_id = $request->cliente_id;
            
            $CabeceraFactura->save(); 

            $DetalleFactura = DetalleFactura::findOrFail($id);

            $DetalleFactura->producto_id = $request->producto_id;
            $DetalleFactura->factura_id = $CabeceraFactura->id;
            $DetalleFactura->cantidad = $request->cantidad;
            $DetalleFactura->precio = $request->precio;

            $DetalleFactura->save();

            \Session::flash('message-edit', $CabeceraFactura->codigo_factura.' se actualizo correctamente.');

            return redirect('/factura');
    }

    public function delete($id){

        
        $DetalleFactura = DetalleFactura::findOrFail($id);

        $DetalleFactura->delete();
        
        $CabeceraFactura = CabeceraFactura::findOrFail($id);

        $CabeceraFactura->delete();


        \Session::flash('message-delete', $CabeceraFactura->codigo_factura.' ha sido eliminado.');

        return redirect('/factura');
    }
}
