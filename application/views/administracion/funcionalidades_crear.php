
<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> Gestion Usuarios</h4>
            </div>
            <form role="form" action="<?=  base_url()?>Administracion/AgregarFuncionalidad" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre" required>
                    </div>
                    <?php if($this->uri->segment(3) > 0){ ?>
                    <div class="form-group">
                        <label for="Nombre">URL</label>
                        <input name="URL" type="text" class="form-control" id="URL" placeholder="URL" required>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="Nombre">Control</label>
                        <input name="control"  type="text" class="form-control" id="control" placeholder="Control" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Orden</label>
                        <input name="orden"  type="number" class="form-control" min="0" id="orden" placeholder="Orden" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Icono </label>
                        <input name="icono" type="text" class="form-control" id="icono" placeholder="Icono" required>
                    </div>
 
                    <input type="hidden" name="padre" value="<?=$this->uri->segment(3)?>">

                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Volver</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Crear Funcionalidad </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
