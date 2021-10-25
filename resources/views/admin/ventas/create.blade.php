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
                            <i class="fas fa-globe"></i> &nbsp;&nbsp;<strong>Venta &nbsp;&nbsp;</strong><br> #1
                        </div>

                        <div class="col-4">
                            <i class="fas fa-globe"></i>&nbsp;&nbsp;<strong>Persona que atiende
                                &nbsp;&nbsp;</strong><br>
                            {{auth()->user()->name}}
                        </div>

                        <div class="col-md-4">
                            <i class="fas fa-globe"></i>
                            <label>Fecha de recibido:</label>
                            <div class="input-group date" id="fecha_recibido" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="fecha_recibido"
                                    data-target="#fecha_recibido"
                                    value="{{ date('d/m/Y H:i:s',strtotime('-5 hours'))}}" />
                                <div class="input-group-append" data-target="#fecha_recibido"
                                    data-toggle="datetimepicker" disable>
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <br>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Cliente</label>
                                <select class="form-control" name="cliente_id" id="cliente_id" required
                                    onchange="obtenerDescuento();">
                                    <option value="">Elija un cliente</option>
                                    @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de entrega:</label>
                                <div class="input-group date" id="fecha_entrega" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#fechaentrega"
                                        value="{{ date('d/m/Y H:i:s',strtotime('-5 hours'))}}" name="fecha_entrega" />
                                    <div class="input-group-append" data-target="#fecha_entrega"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>







                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Forma de Pago</label>
                                <select class="form-control" name="forma_pago_id" required >
                                    <option value="">Elija una forma de pago</option>
                                    @foreach ($formas_de_pago as $forma_de_pago)
                                    <option value="{{ $forma_de_pago->id }}"
                                        {{ old('forma_de_pago_id') == $forma_de_pago->id ? 'selected' : '' }}>
                                        {{ $forma_de_pago->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="anticipo">Anticipo:</label>


                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="anticipo" value="0">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fas fa-box"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <input type="text" class="form-control" hidden name="descuento" id="descuento">

                    <h6>Producto</h6>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control" name="categoria_id" id="categoria_id"
                                    onchange="listarProductos();">
                                    <option value="">Elija una categoria</option>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Producto</label>
                                <select class="form-control" id="producto_id" onchange="calculoTotalArea();">


                                </select>
                            </div>
                        </div>



                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" minlength="1"
                                    maxlength="30" placeholder="5">
                            </div>

                        </div>







                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="precio_venta">Precio de venta</label>
                                <input type="text" name="precio_venta" id="precio_venta" class="form-control"
                                    minlength="1" disabled>
                            </div>

                        </div>


                    </div>


                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="ancho">Ancho</label>
                                <input type="number" onchange="calculoTotalArea();"  name="ancho" id="ancho" class="form-control" value="0"
                                    placeholder="10.4" >
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="alto">Alto</label>
                                <input type="number" name="alto" id="alto" class="form-control" onchange="calculoTotalArea();" value="0"
                                    placeholder="5.5">
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="total_x_area">Costo de Producto Por Area</label>
                                <input type="number" id="total_x_area" 
                                    name="total_x_area" class="form-control" value="0" disabled>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <label for="agregar">&nbsp;</label>
                            <div class="form-group">
                                <button type="button" id="btn_add" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>



                    </div>



                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="detalles" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width=12%;">Opciones</th>
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
                                    placeholder="Ingresar ..."></textarea>


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
                                            <h6 id="lbl_descuento">0.00%</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>
                                            <h6 id="lbl_total">$/.0.00</h4><input  hidden name="total_venta" id="total_venta">
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
$('#fecha_entrega').datetimepicker({
    icons: {
        time: 'far fa-clock'
    }
});
$('#fecha_recibido').datetimepicker({
    icons: {
        time: 'far fa-clock'
    }
});

function listarProductos() {

    idCategoria = document.getElementById('categoria_id').value;

    $('#producto_id').empty();

    //alert(idCategoria);
    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'productosPorCategoria/' + idCategoria,
        success: function(data) {
            console.log(data);
            $('#producto_id').append('<option value="">Selecione un producto</option>');
            for (var i = 0; i < data.length; i++) {
                $('#producto_id').append('<option value="' + data[i].id + '-' + data[i].nombre + '-' + data[
                        i].precio_venta + '-' + data[
                        i].tipo_producto + '">' + data[i].nombre +
                    '</option>');
            }

        },
        error: function() {
            console.log(data);
        }
    });

}

function obtenerDescuento() {

    idCliente = document.getElementById('cliente_id').value;

    $('#descuento').val = "";


    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'obtenerDescuento/' + idCliente,
        success: function(data2) {
            $('#descuento').val(data2.descuento);

            $("#lbl_descuento").html(data2.descuento + "%");

            $("#sub_total_venta").html("$" + (total));

            $("#lbl_total").html("$" + (total) * (1 - (data2.descuento / 100)));

            $("#total_venta").val((total) * (1 - (data2.descuento / 100)));

            evaluar();

        },
        error: function() {
            console.log(data2);
        }
    });





}

function calculoTotalArea() {
    datosProducto = document.getElementById('producto_id').value.split('-');
    idarticulo = datosProducto[0];
    nombre = datosProducto[1];
    tipoProducto = datosProducto[3];

    precio_venta = $("#precio_venta").val();

    cantidad = $("#cantidad").val();
    ancho = $("#ancho").val();
    alto = $("#alto").val();
    total_x_area = 0;
    descuento = $("#descuento").val();




    if (tipoProducto == "pieza") {
        total_x_area = 0;
        $("#total_x_area").val( total_x_area);

    } else {
        total_x_area = ((ancho * alto) * precio_venta);
        $("#total_x_area").val( total_x_area);


    }

}


$(document).ready(function() {
    $("#btn_add").click(function() {
        agregar();
    });
});



var cont = 0;
total = 0;
total = 0;
subtotal = [];
$("#guardar").hide();
$('#producto_id').change(mostrarvalores);

function mostrarvalores() {

    datosProducto = document.getElementById('producto_id').value.split('-');
    $('#precio_venta').val(datosProducto[2]);


}

function agregar() {
    datosProducto = document.getElementById('producto_id').value.split('-');
    idarticulo = datosProducto[0];
    nombre = datosProducto[1];
    tipoProducto = datosProducto[3];
    precio_venta = $("#precio_venta").val();

    cantidad = $("#cantidad").val();
    ancho = $("#ancho").val();
    alto = $("#alto").val();
    total_x_area = 0;
    descuento = $("#descuento").val();






    if (tipoProducto == "pieza") {
        total_x_area = 0;
    } else {
        total_x_area = ((ancho * alto) * precio_venta) * cantidad;
      
    }




    if (idarticulo != "" && cantidad != "" && cantidad > 0 && precio_venta != "") {
        if (tipoProducto == "pieza") {
            subtotal[cont] = (cantidad * precio_venta);;
        } else {


            subtotal[cont] = ((ancho * alto) * precio_venta) * cantidad;
        }

        total = total + subtotal[cont];
        var fila = '<tr class="selected" id="fila' + cont +
            '"> ' +
            '<td style="width="12%;"><button type="button" class="btn  btn-warning" onclick="eliminar(' + cont +
            ');">X</button></td> ' +
            ' <td style="width="15%;"><input type="hidden" name="producto_idDetalle[]" value="' + idarticulo + '">' +
            nombre + '</td>' +
            '<td style="width="12%;"><input type="hidden" name="precio_venta[]"   type="text" value="' +
            precio_venta +
            '">' +
            precio_venta + '</td> ' +
            '<td style="width="12%;"><input type="hidden" name="cantidadDetalle[]"   type="text" value="' +  cantidad +'"> ' +
            cantidad + '</td> ' +
            '<td style="width="12%;"><input  type="hidden" name="anchoDetalle[]"   type="text" value="' + ancho +
            '">' +
            ancho + '</td> ' +
            '<td style="width="12%;"><input type="hidden" name="altoDetalle[]"   type="text" value="' + alto +
            '">' +
            alto + '</td> ' +
            '<td style="width="12%;"><input type="hidden" name="total_x_area[]"  type="text" value="' +
            total_x_area +
            '" >' +
            total_x_area + '</td> ' +
            '<td style="width="12%;">' + subtotal[cont] + '</td></tr>';
        cont++;
        limpiar();

        $("#sub_total_venta").html("$" + total);

        $("#total_venta").val(total * (1 - (descuento / 100)));
        $("#lbl_total").html("$" + total * (1 - (descuento / 100)));

        evaluar();
        $("#detalles").append(fila);


    } else {
        alert("Error al ingresar el detalle  de la, revise los  datos del  articulo");
    }


}

function limpiar() {
    $("#cantidad").val("");
    $("#precio_venta").val("");
    $("#ancho").val("");
    $("#alto").val("");
    $("#total_x_area").val("");
}

function evaluar() {
    if (total > 0) {
        $("#guardar").show();



    } else {
        $("#guardar").hide();
    }
}

function eliminar(index) {
    descuento = $("#descuento").val();
    $("#sub_total_venta").html("$" + (total - subtotal[index]));

    $("#lbl_total").html("$" + (total - subtotal[index]) * (1 - (descuento / 100)));

    $("#total_venta").val((total - subtotal[index]) * (1 - (descuento / 100)));
    $("#fila" + index).remove();
    evaluar();

}
</script>
336.16

@endpush