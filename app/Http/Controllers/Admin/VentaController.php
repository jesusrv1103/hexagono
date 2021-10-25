<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Venta;

use App\Admin\Cliente;
use App\Admin\Producto;
use App\Admin\FormaDePago;
use App\Admin\Pago;
use App\Admin\Categoria;
use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Redirect;

use App\Admin\DetalleVenta;
use DateTime;


use Illuminate\Support\Facades\Crypt;


class VentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $ventas = Venta::where('estado', '=','1')->get();
        return view('admin.ventas.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::where('estado','=','1')->get();
        $productos = Producto::where('estado','=','1')->get();
        $formas_de_pago = FormaDePago::where('estado','=','1')->get();
        $categorias = Categoria::where('estado','=','1')->get();
        return view('admin.ventas.create',compact('clientes','productos','categorias','formas_de_pago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
        DB::beginTransaction();

            try {
            $venta = new Venta;
            $venta->user_id= auth()->id();
            $venta->cliente_id = $request->get('cliente_id');
            $venta->fecha_recibido =date('Y-m-d H:i:s', strtotime($request->get('fecha_entrega')));
            $venta->fecha_entrega =  date('Y-m-d H:i:s', strtotime($request->get('fecha_recibido')));

            $venta->total =$request->get('total_venta');;
            $venta->comentarios =$request->get('comentarios');//$request->get('comentarios');
            $venta->save();


            $pago = new Pago;
            $pago->venta_id = $venta->id;
            $pago->forma_pago_id = $request->get('forma_pago_id');
            $pago->monto_pago = $request->get('anticipo');
            $pago->fecha_pago =date('Y-m-d', strtotime($request->get('fecha_recibido')));
            $pago->save();


            $producto_idDetalle = $request->get('producto_idDetalle');
            $cantidadDetalle = $request->get('cantidadDetalle');
            $anchoDetalle = $request->get('anchoDetalle');
            $altoDetalle = $request->get('altoDetalle');
         
            $cont = 0;


            while($cont < count($producto_idDetalle)){
                $detalle = new DetalleVenta();
                $detalle->venta_id= $venta->id;
                $detalle->producto_id= $producto_idDetalle[$cont];
                $detalle->cantidad= $cantidadDetalle[$cont];
                $detalle->ancho= $anchoDetalle[$cont];
                $detalle->alto= $altoDetalle[$cont];
                $detalle->save();
           
           
           
                $cont=$cont+1;            
           
              }
         
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            echo "Ocurrio un error";
        }



        return Redirect::to('admin/ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decryptString($id);
        $venta=Venta::findOrFail($id);
        
     
        return view('admin.ventas.show',compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
