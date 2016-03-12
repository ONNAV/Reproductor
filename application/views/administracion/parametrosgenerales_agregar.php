
<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> Parametros Generales</h4>
            </div>
            <form role="form" action="<?=base_url()?>Administracion/AgregarParametrosGenerales" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="Email">Valor 1 </label>
                        <input name="v1" type="text" class="form-control" id="v1" placeholder="Valor 1" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 2 </label>
                        <input name="v2" type="text" class="form-control" id="v2" placeholder="Valor 2">
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 3 </label>
                        <input name="v3" type="text" class="form-control" id="v3" placeholder="Valor 3">
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 4 </label>
                        <input name="v4" type="text" class="form-control" id="v4" placeholder="Valor 4">
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 5 </label>
                        <input name="v5" type="text" class="form-control" id="v5" placeholder="Valor 5">
                    </div>
                    <input name="padre" type="hidden" class="form-control" value="<?= $this->uri->segment(3); ?>">
                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Volver</button>
                        <button type="submit" class="btn btn-primary">Crear Parametro General </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
