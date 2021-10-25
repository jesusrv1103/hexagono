<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Producto; 
use App\Admin\Categoria; 

use App\Http\Requests\ProductoRequest;
use DB;

use Illuminate\Support\Facades\Crypt;



class ProductoController extends Controller
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
        $productos = Producto::where('estado','1')->get();
 
        return view('admin.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasProductos = Categoria::where('estado','1')->get();
        return view('admin.productos.create',compact('categoriasProductos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {

        $producto=Producto::create($request->validated());

        $producto->tipo_producto = $request->input('tipoProducto') == "area" ? 'area' : 'pieza';
      
        $producto->save();
        return back()->with('mensaje','Se ha añadido un nuevo  producto');
    }


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public
     function edit($id)
    {
        $id = Crypt::decryptString($id);
        $producto=Producto::findOrFail($id);
        
        $categoriasProductos = Categoria::where('estado','1')->get();
        return view('admin.productos.edit',compact('producto',
            'categoriasProductos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
    
        
      //  dd($request);

        $id= Crypt::decryptString($id);
        $producto=Producto::findOrFail($id);

        $producto->update($request->validated());

        $producto->tipo_producto = $request->input('tipo_producto') == "area" ? 'area' : 'pieza';
        //Aplicamos Politica de Acceso al metodo correspondiente
        $producto->update();
        return redirect('admin/productos')->with('mensaje','Se ha editado producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id= Crypt::decryptString($id);
        $producto=Producto::findOrFail($id);
        //Aplicamos Politica de Acceso al metodo correspondiente
        $producto->estado=0;
        $producto->update();
        return back()->with('mensaje','Se ha eliminado producto');
    }
}
