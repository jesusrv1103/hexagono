<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Categoria; 
use App\Http\Requests\CategoriaRequest;
use DB;
use Illuminate\Support\Facades\Crypt;

class CategoriaController extends Controller
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
        $categorias = Categoria::where('estado','1')->get();
        return view('admin.categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $categoria=Categoria::create($request->validated());
        return back()->with('mensaje','Se ha añadido una nueva categoria');
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
    public function update(CategoriaRequest $request, $id)
    {
        $id= Crypt::decryptString($id);
        $categoria=Categoria::findOrFail($id);
        //Aplicamos Politica de Acceso al metodo correspondiente
        $categoria->update($request->validated());
        return back()->with('mensaje','Se ha actualizado la Categoria');
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
        $Categoria=Categoria::findOrFail($id);
        //Aplicamos Politica de Acceso al metodo correspondiente
        $Categoria->estado=0;
        $Categoria->update();
        return back()->with('mensaje','Se ha eliminado Categoria');
    }

    public function productosPorCategoria($id){

        return Categoria::find($id)->productos;
    }
}
