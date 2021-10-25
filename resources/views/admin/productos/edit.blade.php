@extends('admin.layout.layout')
@section('title')
<h1 class="m-0 text-dark">Editar Producto</h1>
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
                <h3 class="card-title">Editar Producto</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form method="POST" action="{{route('admin.productos.update',Crypt::encryptString($producto->id))}}">

                    @method('PUT')
                    @csrf

                    <div class="row">

                        <div class="col-md-6 text-left-right">
                            <div class="form-group">
                                <label for="codigo">Codigo:</label>
                                <input type="text" name="codigo" class="form-control"
                                    placeholder="Ingrese el codigo del producto" required minlegth="1" maxlength="20"
                                    title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                                    value="{{old('codigo',$producto->codigo)}}">
                            </div>
                        </div>
                        <div class="col-md-6 text-left-right">


                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" class="form-control"
                                    placeholder="Ingrese el nombre del producto" required minlegth="2" maxlength="20"
                                    title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                                    value="{{old('nombre',$producto->nombre)}}">
                            </div>


                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 text-left-right">

                            <div class="form-group">
                                <label for="medida">Medida:</label>
                                <input type="text" name="medida" class="form-control"
                                    placeholder="Ingrese el medida del producto" required minlegth="2" maxlength="20"
                                    title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                                    value="{{old('medida',$producto->medida)}}">
                            </div>
                        </div>


                        <!-- radio -->
                        <div class="col-md-6 text-left-right">
                            <div class="form-group">
                                <label for="tipo_producto">Tipo de producto:</label>
                                <div class="form-check">


                                    <input class="form-check-input" value="pieza" type="radio" name="tipo_producto"
                                        {{$producto->tipo_producto== "pieza" ? "checked": ""}}>
                                    <label class="form-check-label">Pieza</label>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <input class="form-check-input" value="area" type="radio" name="tipo_producto"
                                        {{$producto->tipo_producto== "area" ? "checked": ""}}>
                                    <label class="form-check-label">Área</label>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 text-left-right">
                            <div class="form-group">
                                <label for="categoria_id">Categoría del producto:</label>
                                <select id="categoria_id" name="categoria_id" class="form-control" required
                                    title="Por favor, seleccione la categoría del producto.">
                                    <option {{ old('categoria_id') == $producto->categoria_id ? "selected" : "" }} value="{{$producto->categoria_id}}"> 
                                        {{$producto->categoria->nombre}}
                                    </option>
                                    @foreach ($categoriasProductos as $categoriaProducto)
                                    <option value="{{ $categoriaProducto->id }}"
                                        {{ old('categoria_id') == $categoriaProducto->id ? 'selected' : '' }}>
                                        {{ $categoriaProducto->nombre }}</option>
                                    @endforeach

           
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 text-left-right">


                            <div class="form-group">
                                <label for="material">Material:</label>
                                <input type="text" name="material" class="form-control"
                                    placeholder="Ingrese el material del producto" required minlegth="2" maxlength="20"
                                    title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                                    value="{{old('materia',$producto->material)}}">
                            </div>


                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6 text-left-right">
                            <div class="form-group">
                                <label for="nombre">Precio de compra:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="precio_compra"
                                        value="{{old('precio_compra',$producto->precio_compra)}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fas fa-box"></i></div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6 text-left-right">
                            <div class="form-group">
                                <label for="nombre">Precio de venta General:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="precio_venta"
                                        value="{{old('precio_venta',$producto->precio_venta)}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fas fa-box"></i></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>




                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="numero">Descripción:</label>
                                <input type="text" name="descripcion" class="form-control"
                                    placeholder="Ingrese descripción del producto" required minlegth="2" maxlength="200"
                                    value="{{old('materia',$producto->material)}}">
                            </div>
                        </div>


                    </div> {{-- cierra el row --}}


                    <button class="btn btn-info btn-block">Editar Producto</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection