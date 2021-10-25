<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Cliente; 

use App\Http\Requests\ClienteRequest;
use DB;
use  App\Admin\Sucursal;
use Illuminate\Support\Facades\Crypt;

class ClienteController extends Controller
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
        $clientes = Cliente::where('estado','1')->get();
        return view('admin.clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $aseguradora=Cliente::create($request->validated());
        return back()->with('mensaje','Se ha añadido una nueva aseguradora');
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
    public function update(ClienteRequest $request, $id)
    {
        $id= Crypt::decryptString($id);
        $aseguradora=Cliente::findOrFail($id);
        //Aplicamos Politica de Acceso al metodo correspondiente
        $aseguradora->update($request->validated());
        return back()->with('mensaje','Se ha actualizado la sucursal');
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
        $cliente=Cliente::findOrFail($id);
        //Aplicamos Politica de Acceso al metodo correspondiente
        $cliente->estado=0;
        $cliente->update();
        return back()->with('mensaje','Se ha eliminado cliente');
    }


    public function obtenerDescuento($id){

        return Cliente::find($id);
    }
}
