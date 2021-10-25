@extends('admin.layout.layout')
@section('title')
<h1 class="m-0 text-dark">Inicio</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop

@section('content')

<div class="row">
    <!-- TABLE: LATEST ORDERS -->
    <div class="card col-md-12">
        <div class="card-header border-transparent">
            <h3 class="card-title">Ultimas ordenes</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Numero de orden</th>
                            <th>Descripción</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR1841</a></td>
                            <td>Samsung Smart TV</td>
                            <td><span class="badge badge-warning">Pendiente</span></td>
                          
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                            <td>iPhone 6 Plus</td>
                            <td><span class="badge badge-danger">Entregada</span></td>
                          
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR1844</a></td>
                            <td>Samsung Smart TV</td>
                            <td><span class="badge badge-warning">Pendiente</span></td>
                          
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR7434</a></td>
                            <td>iPhone 6 Plus</td>
                            <td><span class="badge badge-danger">Entregada</span></td>
                          
                        </tr>
                      
    
                       
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Realizar nuevo pedido</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Ver todos los pedidos</a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>


@stop