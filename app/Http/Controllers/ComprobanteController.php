<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,PDF;

use App\Repositories\ClienteRepository;
use App\Repositories\ProductoRepository;
use App\Repositories\ComprobanteRepository;

use App\Comprobantes;
use App\Productos;

class ComprobanteController extends Controller
{
    private $_clienteRepo;
    private $_productoRepo;
    private $_comprobanteRepo;

    public function __construct(
        ClienteRepository $clienteRepo,
        ProductoRepository $productoRepo,
        ComprobanteRepository $comprobanteRepo
    )
    {
        $this->middleware('auth');

        $this->_clienteRepo = $clienteRepo;
        $this->_productoRepo = $productoRepo;
        $this->_comprobanteRepo = $comprobanteRepo;
    }

    public function index(Request $request){

        $model = Comprobantes::name($request->get('name'))->orderby('id','DESC')->paginate(7);

        return view('CrudFacturas.factura', compact('model'));
    }

    public function detail($id){

        return view('CrudFacturas.facturaDetail', ['model' => $this->_comprobanteRepo->get($id)]);
    }

    public function pdf($id){
        $model = $this->_comprobanteRepo->get($id);
        $comprobante_name = sprintf('comprobante-%s.pdf', str_pad ($model->id, 7, '0', STR_PAD_LEFT));

        $pdf = PDF::loadView('CrudFacturas.facturaPdf', [
            'model' => $model
        ]);

        return $pdf->download($comprobante_name);
    }

    public function create(){

        return view('CrudFacturas.facturaAdd');
    }

    public function post(Request $request){

        $res = false;

        $data = (object)[
            'iva' => $request->input('iva'),
            'subtotal' => $request->input('subtotal'),
            'total' => $request->input('total'),
            'cliente_id' => $request->input('cliente_id'),
            'detail' => []
        ];

        foreach($request->input('detail') as $d){
            $data->detail[] = (object)[ 
                'producto_id' => $d['id'],
                'cantidad' => $d['cantidad'],
                'precio_unitario' => $d['precio_unitario'],
                'precio_venta' => $d['precio_venta'],
                'total' => $d['total']
            ];

            $Productos = Productos::findOrFail($d['id']);

            if($Productos->cantidad > 0){
                if($d['cantidad'] <= $Productos->cantidad){
                    $Productos->cantidad = $Productos->cantidad - $d['cantidad'];
                    $res = true;
                }
            }
            

            else{
                $res = false;
            }

            
            if($res == true){
                \Session::flash('message-add', '¡Registro exitoso!');
                $Productos->save();
            }

            else{
                return $this->_comprobanteRepo->save('');
            }

        }

        if($res== true){
            return $this->_comprobanteRepo->save($data);
        }
    }

    public function findClient(Request $request){

        return $this->_clienteRepo->findByName($request->input('q'));
    }

    public function findProduct(Request $request){

        return $this->_productoRepo->findByName($request->input('q'));
    }

}
