<div class="modal fade" aria-hidden="true" id="modal-edit-{{$sucursal->id}}" tabindex="-1" role="dialog" tabindex="-1"
    aria-hidden="true">
    <form method="POST" action="{{route('admin.sucursales.update',Crypt::encryptString($sucursal->id))}}">
        @method('PUT')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Sucursal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body col-12">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control"
                            placeholder="Ingrese el nombre de la sucursal" required minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                            value="{{old('nombre',$sucursal->nombre)}}">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="numero">Domicilio:</label>
                                <input type="text" name="domicilio" class="form-control"
                                    placeholder="Ingrese domicilio de la Sucursal" required minlegth="2" maxlength="200"
                                    value="{{old('domicilio',$sucursal->domicilio)}}">
                            </div>
                        </div>


                    </div> {{-- cierra el row --}}


                    <div class="row">
                        <div class="col-12">
                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Telefono:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="telefono" class="form-control"
                                        data-inputmask='"mask": "(999) 999-9999"' data-mask
                                        value="{{old('telefono',$sucursal->telefono)}}">>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                        </div>


                    </div> {{-- cierra el row --}}


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Editar Sucursal</button>
                    </div>
                </div>
            </div>

    </form>

</div>