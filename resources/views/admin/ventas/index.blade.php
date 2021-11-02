@extends('admin.layout.layout')
@section('title')
    <h1 class="m-0 text-dark">Ventas</h1>
@endsection
@section('content-header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
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
                        <a href="{{ route('admin.ventas.create') }}" class="btn btn-secondary float-right">
                            <i class="fa fa-plus"></i> Añadir Venta
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table_id" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Folio</th>

                                    <th>Atendio</th>
                                    <th>Cliente</th>
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
                                @foreach ($ventas as $venta)
                                    <tr>
                                        <td>{{ $venta->id }}</td>
                                        <td>{{ $venta->user->name }}</td>
                                        <td>{{ $venta->cliente->nombre }}</td>
                                        <td>{{ $venta->fecha_recibido }}</td>
                                        <td>{{ $venta->fecha_entrega }}</td>
                                        <td>${{ number_format($venta->total, 2) }}</td>
                                        <td>${{ number_format($venta->pagos->first()->monto_pago, 2) }}</td>
                                        <td>
                                            @php
                                                $saldo = $venta->total;
                                            @endphp
                                            @foreach ($venta->pagos as $pago)
                                                @php
                                                    $saldo -= $pago->monto_pago;
                                                @endphp
                                            @endforeach
                                            $ {{ number_format($saldo, 2) }}
                                        </td>
                                        <th>
                                            <center>
                                                <input class="estado" type="checkbox"
                                                    {{ $venta->entregado == 1 ? 'checked' : '' }}
                                                    id="{{ $venta->id }}" value="{{ $venta->entregado }}">
                                            </center>
                                        </th>
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
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.ventas.ticket', Crypt::encryptString($venta->id)) }}"><i
                                                                class="fas fa-user-edit"></i> Imprimir Ticket</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.ventas.edit', Crypt::encryptString($venta->id)) }}"><i
                                                                class="fas fa-user-edit"></i> Editar</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.ventas.show', Crypt::encryptString($venta->id)) }}"><i
                                                                class="fas fa-user-edit"></i> Ver </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            data-target="#modal-destroy-{{ $venta->id }}"
                                                            data-toggle="modal"><i class="fas fa-user-times"></i>
                                                            Eliminar</a>
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

    <script>
        $(document).on('change', 'input[type="checkbox"]', function(e) {
            let idVenta = this.id;
            clase = $("#" + idVenta).attr('class');
            $.ajax({
                url: 'guardar/ventas/1',
                method: "POST",
                data: {
                    id: idVenta,
                    _token: '{!! csrf_token() !!}',
                },
                success: function(data) {
                    alert("Se ha actualizado el estado")
                }
            });


        });
    </script>
@endpush
