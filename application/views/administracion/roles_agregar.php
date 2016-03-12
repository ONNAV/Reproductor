
<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> Agregar Rol</h4>
            </div>
            <form role="form" action="<?=base_url()?>Administracion/AgregarRol" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="Email">Codigo</label>
                        <input name="cod" type="text" class="form-control" id="cod" placeholder="Codigo" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Descripcion </label>
                        <input name="desc" type="text" class="form-control" id="desc" placeholder="Descripcion">
                    </div>
                    
                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Volver</button>
                        <button type="submit" class="btn btn-primary">Crear Rol </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
