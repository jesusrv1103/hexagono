<div class="modal fade" aria-hidden="true" id="modal-create" tabindex="-1" role="dialog" tabindex="-1"
    aria-hidden="true">
    <form method="POST" action="{{route('admin.categorias.store')}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body col-12">
                    <div class="form-group">
                        <label for="categoria">Nombre:</label>
                        <input type="text" name="nombre" class="form-control"
                            placeholder="Ingrese nombre de la categoria" required minlegth="2" maxlength="20"
                            title="Solo se permiten letras. Tamaño mínimo: 2. Tamaño máximo: 20"
                            value="{{old('nombre')}}">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" name="descripcion" class="form-control"
                                    placeholder="Ingrese descripcion de la categoria" required minlegth="2"
                                    maxlength="200" value="{{old('descripcion')}}">
                            </div>
                        </div>


                    </div> {{-- cierra el row --}}




                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Crear Categoria</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>