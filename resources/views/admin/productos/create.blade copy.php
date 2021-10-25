<div class="modal fade" aria-hidden="true" id="modal-create" tabindex="-1" role="dialog" tabindex="-1"
    aria-hidden="true">
    <form method="POST" action="{{route('admin.productos.store')}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body col-12">
                    <div class="form-group">
                        <label for="codigo">Codigo:</label>
                        <input type="text" name="codigo" class="form-control"
                            placeholder="Ingrese el codigo del producto" required
                            pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,20}" minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                            value="{{old('codigo')}}">
                    </div>



                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control"
                            placeholder="Ingrese el nombre del producto" required
                          minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                            value="{{old('nombre')}}">
                    </div>

                    <div class="form-group">
                        <label for="medida">Medida:</label>
                        <input type="text" name="medida" class="form-control"
                            placeholder="Ingrese el medida del producto" required
                          minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                            value="{{old('medida')}}">
                    </div>


                    <!-- radio -->
                    <div class="form-group">
                        <label for="nombre">Tipo de producto:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1">
                            <label class="form-check-label">Pieza</label>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="radio1" checked>
                            <label class="form-check-label">Área</label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="categoria_producto_id">Categoría del producto:</label>
                        <select id="categoria_producto_id" name="categoria_producto_id" class="form-control" required
                            title="Por favor, seleccione la categoría del producto.">
                            <option value="">Elija una categoría</option>
                            @foreach ($categoriasProductos as $categoriaProducto)
                            <option value="{{ $categoriaProducto->id }}"
                                {{ old('categoria_producto_id') == $categoriaProducto->id ? 'selected' : '' }}>
                                {{ $categoriaProducto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Precio de compra:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-box"></i></div>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="nombre">Precio de venta General:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-box"></i></div>
                            </div>
                        </div>

                    </div>






                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="numero">Descripción:</label>
                                <input type="text" name="descripcion" class="form-control"
                                    placeholder="Ingrese descripción del producto" required minlegth="2" maxlength="200"
                                    value="{{old('domicilio')}}">
                            </div>
                        </div>


                    </div> {{-- cierra el row --}}




                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Crear producto</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>