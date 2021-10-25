@extends('admin.layout.layout')
@section('title')
<h1 class="m-0 text-dark">Alta Empleado</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop
@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Nuevo Empleado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('admin.empleados.store')}}" enctype="multipart/form-data">
                    @csrf
                    <h4>Datos personales</h4>
                    <div class="row">


                        <div class="col-md-3 text-left-center">
                            <center>
                                <img class="profile-user-img img-fluid img-circle" id="foto_perfil"
                                    src="{{asset('assets/dist/img//avatar.png')}}" alt="User profile picture">
                            </center>
                        </div>

                        <div class="col-md-3 text-left-right">
                            <div class="form-group">
                                <label for="exampleInputFile">Foto de empleado</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputFoto" name="foto_perfil">
                                        <label class="custom-file-label" for="Foto de empleado">Elegir imagen</label>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" value="{{old('nombre')}}" class="form-control" name="nombre"
                                    minlength="2" maxlength="25" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,25}"
                                    title="Solamente se aceptan letras. Tamaño mínimo: 2. Tamaño máximo: 25."
                                    placeholder="Ingrese el nombre del empleado">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apellido">Apellidos</label>
                                <input type="text" value="{{old('apellido')}}" class="form-control" name="apellido"
                                    minlength="2" maxlength="40" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,40}"
                                    title="Solamente se aceptan letras. Tamaño mínimo: 2. Tamaño máximo: 40."
                                    placeholder="Ingrese el apellido del empleado">
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 text-left-center">
                            <div class="form-group">
                                <label for="curp">CURP</label>
                                <input type="text" name="curp" value="{{old('curp')}}" class="form-control"
                                    minlength="18" maxlength="18" required
                                    pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"
                                    placeholder="Ingrese la CURP del empleado"
                                    title="El formato debe ser como en la credencial.">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rfc">RFC</label>
                                <input type="text" name="rfc" value="{{old('rfc')}}" class="form-control" required
                                    pattern="([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})"
                                    min="12" max="13" placeholder="Ingrese el RFC del empleado"
                                    title="El formato debe ser como en el Registro Federal de Contribuyentes.">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" name="correo" value="{{old('correo')}}" class="form-control"
                                    required placeholder="Ingrese el correo electronico del empleado">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 text-left-center">
                            <div class="form-group">
                                <label for="nss">NSS</label>
                                <input type="text" name="nss" value="{{old('nss')}}" class="form-control" minlength="8"
                                    maxlength="8" required pattern="[0-9]{8,8}"
                                    title="Solamente se aceptan números. Tamaño mínimo: 8. Tamaño máximo: 8."
                                    placeholder="Ingrese el NSS del empleado">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="carrera">Telefono</label>
                                <input type="text" name="carrera" value="{{old('carrera')}}" class="form-control"
                                    minlength="2" maxlength="30" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,30}"
                                    title="Solamente se aceptan letras. Tamaño mínimo: 2. Tamaño máximo: 30."
                                    placeholder="Ingrese telefono del empleado">
                            </div>
                        </div>


                    </div>
                    <h4>Domicilio</h4>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="calle">Direccion(Muncipio/Colonia/CP)</label>
                                <input type="text" value="{{old('calle')}}" class="form-control" name="calle"
                                    minlength="2" maxlength="40" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,40}"
                                    title="Solamente se aceptan letras. Tamaño mínimo: 2. Tamaño máximo: 40."
                                    placeholder="Ingrese la calle del domicilio del empleado">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="calle">Direccion(Calle/Numero)</label>
                                <input type="text" value="{{old('calle')}}" class="form-control" name="calle"
                                    minlength="2" maxlength="40" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,40}"
                                    title="Solamente se aceptan letras. Tamaño mínimo: 2. Tamaño máximo: 40."
                                    placeholder="Ingrese la calle del domicilio del empleado">
                            </div>
                        </div>
                    </div>


                    <h4>D</h4>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Time picker:</label>

                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#timepicker" />
                                            <div class="input-group-append" data-target="#timepicker"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="calle">Direccion(Calle/Numero)</label>
                                <input type="text" value="{{old('calle')}}" class="form-control" name="calle"
                                    minlength="2" maxlength="40" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,40}"
                                    title="Solamente se aceptan letras. Tamaño mínimo: 2. Tamaño máximo: 40."
                                    placeholder="Ingrese la calle del domicilio del empleado">
                            </div>
                        </div>
                    </div>


            </div>







        </div>







    </div>

    <button class="btn btn-info btn-block">Añadir Empleado</button>
</div>

</form>

</div>
</div>
</div>
</div>

@endsection
@push('styles')
{{-- Incluimos css de select2 --}}
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@include('auxiliares.design-datetime')
@include('auxiliares.design-color-timepicker')
@endpush
@push('scripts')
{{-- Incluimos js de select2 --}}
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
@include('auxiliares.scripts-design-datetime')
@include('auxiliares.scripts-color-timepicker')


<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
})
$('#inputFoto').on('change', function(ev) {
    var f = ev.target.files[0];
    var fr = new FileReader();
    fr.onload = function(ev2) {
        console.dir(ev2);
        $('#foto_perfil').attr('src', ev2.target.result);
    };
    fr.readAsDataURL(f);
});
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>





@endpush