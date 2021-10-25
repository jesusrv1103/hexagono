@extends('admin.layout.layout')
@section('title')
<h1 class="m-0 text-dark">Crear Usuario</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Nuevo Usuario</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('admin.usuarios.store')}}">
                    @csrf
                    <div class="form-group col-md-8">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="email">Correo Electronico: </label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control">
                    </div>

                    <div class="form-group col-md-8">
                        <label for="persona_id">Sucursales</label>
                        <select class="form-control select2" id="bancos"
                            data-placeholder="Seleccione sucursal a asignar" style="width: 100%;" name="sucursal_id"
                            required>
                            <option selected="selected" value="">Seleccione la sucursal a asignar</option>
                            @foreach ($sucursales as $sucursal)
                            <option {{ old('sucursal_id') == $sucursal->id ? "selected" : "" }}
                                value="{{$sucursal->id}}">{{$sucursal->nombre}} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-8">
                        <label for="persona_id">Roles</label>
                        <select class="form-control select2" id="roles"
                            data-placeholder="Seleccione rol a asignar" style="width: 100%;" name="rol_id"
                            required>
                            <option selected="selected" value="">Seleccione el rol a asignar</option>
                            @foreach ($roles as $rol)
                            <option {{ old('rol_id') == $rol->id ? "selected" : "" }} value="{{$rol->id}}">
                                {{$rol->name}} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-8">
                        <label for="password" >{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                 
                    </div>

                 



                    <div class="form-group col-md-8">
                        <label for="password-confirm"
                            >{{ __('Confirm Password') }}</label>

                     
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                
                    </div>


                    <button class="btn btn-info btn-block">Crear Usuario</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush
@push('scripts')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>
@endpush