<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Admin\Sucursal; 
use App\Admin\Rol; 

use App\Http\Requests\UserRequest;
use DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function __construct()
    {
     //   $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= User::where('estado','=',1)->get();
        return view('admin.usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales= Sucursal::where('estado','=',1)->get();
        $roles= Rol::get();
        return view('admin.usuarios.create',compact('sucursales','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $usuario = User::create($request->validated());
        $usuario->password = Hash::make($request->get('password'));
        $usuario->save();
      
        $usuario->roles()->attach(Rol::where('id', $request->get('rol_id'))->first());

        return back()->with('mensaje','Se ha añadido una nuevo usuario');
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
        $id= Crypt::decryptString($id);
        $usuario=User::findOrFail($id);
        //Aplicamos Politica de Acceso al metodo correspondiente
        $usuario->estado=0;
        $usuario->update();
        return back()->with('mensaje','Se ha eliminado usuario');
    }
}
