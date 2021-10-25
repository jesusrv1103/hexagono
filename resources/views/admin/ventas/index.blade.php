@extends('admin.layout.layout')
@section('title')
<h1 class="m-0 text-dark">Ventas</h1>
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
          <h3 class="card-title">Listado de Ventas</h3>
          <a href="{{route('admin.ventas.create')}}" class="btn btn-secondary float-right">
          <i class="fa fa-plus"></i> Añadir Venta
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Atendio</th>
                <th>Fecha Entrada</th>
                <th>Entrega</th>
                <th>Total</th>
                <th>Anticipo</th>
                <th>Adeudo</th>
                <th>Estatus</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ventas as $venta)
              <tr>
                <td>{{$venta->id}}</td>
                <td>{{$venta->user->name}}</td>
                <td>{{$venta->cliente->nombre}}</td>
                <td>{{$venta->fecha_recibido}}</td>
                <td>{{$venta->fecha_entrega}}</td>
                <td>{{$venta->total}}</td>
                <td>EN PROCESO</td>
                <td>EN PROCESO</td>
                <th>Estatus</th>
                <td>
                  <center>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-flat">Opciones</button>
                    <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="{{route('admin.ventas.edit',Crypt::encryptString($venta->id))}}"><i class="fas fa-user-edit"></i> Editar</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{route('admin.ventas.show',Crypt::encryptString($venta->id))}}"><i class="fas fa-user-edit"></i> Ver </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" data-target="#modal-destroy-{{$venta->id}}" data-toggle="modal"><i class="fas fa-user-times"></i> Eliminar</a>
                      <div class="dropdown-divider"></div>
                  
                    </div>
                  </div>
                  </center>
                </td>
              </tr>
              @include('admin.ventas.destroy')
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
@include('auxiliares.scripts-datatables')
@endpush
