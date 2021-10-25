@extends('admin.layout.layout')
@section('title')
<h1 class="m-0 text-dark">Productos</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de productos</h3>
                    <a href="{{route('admin.productos.create')}}" class="btn btn-secondary float-right">
                        <i class="fa fa-plus"></i> Añadir Producto
                    </a>

                </div>
                <br>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo de <br>Producto</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Medida</th>
                                <th>Material</th>
                                <th>Precio <br> de compra</th>
                                <th>Precio <br> de venta</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->tipo_producto}}</td>
                                <td>{{$producto->codigo}}</td>
                                <td>{{$producto->categoria->nombre}}</td>
                                <td>{{$producto->medida}}</td>
                                <td>{{$producto->material}}</td>
                                <td>{{$producto->precio_compra}}</td>
                                <td>{{$producto->precio_venta}}</td>
                                <td>
                                    <center>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-flat">Opciones</button>
                                            <button type="button"
                                                class="btn btn-info btn-flat dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="{{route('admin.productos.edit',Crypt::encryptString($producto->id))}}"><i class="fas fa-user-edit"></i> Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-target="#modal-destroy-{{$producto->id}}"
                                                    data-toggle="modal"><i class="fas fa-user-times"></i> Eliminar</a>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                            @include('admin.productos.destroy')
                   
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@stop
@push('styles')
{{-- Incluimos los links del diseño de la tabla de un solo archivo --}}
@include('auxiliares.design-datatables')
@endpush
@push('scripts')
{{-- Incluimos los scripts de la tabla de un solo archivo --}}
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

@include('auxiliares.scripts-datatables')

@endpush