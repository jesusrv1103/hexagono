
<div class="modal fade " aria-hidden="true" id="modal-destroy-{{$producto->id}}" tabindex="-1" role="dialog" tabindex="-1"
    aria-hidden="true">
    <form method="POST" action="{{ route('admin.productos.destroy',Crypt::encryptString($producto->id)) }}">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
             <div class="modal-header">
              <h4 class="modal-title">Eliminar Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body theme_color">
            <div class="form-group {{ $errors->has('producto') ? 'has-error' : '' }}">
                ¿Esta segúro que desea eliminar producto?
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-danger">Eliminar Producto</button>
        </div>
    </div>
</div>
</form>