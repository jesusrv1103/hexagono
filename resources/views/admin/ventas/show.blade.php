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
            <form method="POST" action="{{route('admin.ventas.store')}}">
                @csrf
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-4">
                            <i class="fas fa-globe"></i> &nbsp;&nbsp;<strong>Venta &nbsp;&nbsp;</strong><br> {{$venta->id}}
                        </div>

                        <div class="col-4">
                            <i class="fas fa-globe"></i>&nbsp;&nbsp;<strong>Persona que atiende
                                &nbsp;&nbsp;</strong><br>
                            {{$venta->user->name}}
                        </div>

                        <div class="col-4">
                            <i class="fas fa-globe"></i>&nbsp;&nbsp;<strong>Fecha en que se recibio
                                &nbsp;&nbsp;</strong><br>
                            {{$venta->fecha_recibido}}


                        </div>

                      


                    </div>



                    <br>
                    <div class="row">

                    <div class="col-4">
                            <i class="fas fa-globe"></i>&nbsp;&nbsp;<strong>Fecha de entrega
                                &nbsp;&nbsp;</strong><br>
                            {{$venta->fecha_entrega}}


                        </div>

                        <div class="col-4">
                            <i class="fas fa-globe"></i>&nbsp;&nbsp;<strong>Cliente
                                &nbsp;&nbsp;</strong><br>
                            {{$venta->cliente->nombre}}
                        </div>
              



                        <div class="col-4">
                            <i class="fas fa-globe"></i>&nbsp;&nbsp;<strong>Anticipo
                                &nbsp;&nbsp;</strong><br>
                            {{$venta->cliente->nombre}}
                        </div>







                </div>


                <br><br>

                <h6>Productos</h6>

              

                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table id="detalles" class="table table-striped">
                            <thead>
                                <tr>
                              
                                    <th style="width=15%;">Producto</th>
                                    <th style="width=12%;">Precio<br>Venta</th>
                                    <th style="width=12%;">Cantidad</th>
                                    <th style="width=12%;">Ancho</th>
                                    <th style="width=12%;">Alto</th>
                                    <th style="width=12%;">Total <br>Por Area</th>
                                    <th style="width=13%;">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>




                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">



                        <div class="form-group">
                            <label>Comentarios</label>
                            <textarea style="resize: none;" class="form-control" name="comentarios" rows="3"
                                placeholder="Ingresar ...">{{$venta->comentario}}</textarea>


                        </div>
                        <p class="lead">Payment Methods:</p>
                        <img src="{{ asset('assets/dist/img/credit/visa.png')}}" alt="Visa">
                        <img src="{{ asset('assets/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                        <img src="{{ asset('assets/dist/img/credit/american-express.png')}}" alt="American Express">
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Total</p>

                        <div class="table-responsive">
                            <table class="table">

                                <tr>
                                    <th>SubTotal:</th>
                                    <td>
                                        <h6 id="sub_total_venta">$/.0.00</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Descuento:</th>
                                    <td>
                                        <h6 id="lbl_descuento">{{$venta->cliente->descuento}}%</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>
                                        <h6 id="lbl_total">{{$venta->total}}</h4><input hidden name="total_venta"
                                                id="total_venta">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">

                    <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                        Registrar Venta
                    </button>

                </div>
        </div>
        </form>
    </div>
    <!-- /.invoice -->
</div><!-- /.col -->
</div><!-- /.row -->
</div>
@stop
@push('styles')
{{-- Incluimos los links del diseño de la tabla de un solo archivo --}}
@include('auxiliares.design-datetime')
@include('auxiliares.design-datatables')
@endpush
@push('scripts')
{{-- Incluimos los scripts de la tabla de un solo archivo --}}
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>


@include('auxiliares.scripts-datatables')
@include('auxiliares.scripts-design-datetime')
<script>
//Date and time picker


@endpush