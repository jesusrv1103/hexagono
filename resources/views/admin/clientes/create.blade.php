<div class="modal fade" aria-hidden="true" id="modal-create" tabindex="-1" role="dialog" tabindex="-1"
    aria-hidden="true">
    <form method="POST" action="{{route('admin.clientes.store')}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body col-12">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control"
                            placeholder="Ingrese el nombre del cliente" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{2,20}"
                            minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                            value="{{old('nombre')}}">
                    </div>


                    <div class="form-group">
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" class="form-control" placeholder="Ingrese el rfc del cliente"
                            required minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 12" value="{{old('rfc')}}">
                    </div>




                    <div class="form-group">
                        <label for="correo">Correo electronico:</label>
                        <input type="email" name="correo" class="form-control"
                            placeholder="Ingrese el correo del cliente" required minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                            value="{{old('correo')}}">
                    </div>


                    <div class="form-group">
                        <label for="descuento">Descuento:</label>
                        <div class="input-group mb-3">
                            <input type="number" name="descuento" class="form-control" value="{{old('descuento')}}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-percent"></i></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" class="form-control"
                            placeholder="Ingrese telefono del cliente" required minlegth="2" maxlength="200"
                            value="{{old('telefono')}}">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Crear cliente</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>