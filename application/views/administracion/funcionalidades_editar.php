
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-pencil-square"></i> Edicion Funcionaldades</h4>
            </div>
            <form role="form" action="<?= base_url() ?>Administracion/ModificarFuncionalidad" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="Nombre2" placeholder="Nombre" required>
                    </div>
                    <?php if ($this->uri->segment(3) > 0) { ?>
                        <div class="form-group">
                            <label for="Nombre">URL</label>
                            <input name="URL" type="text" class="form-control" id="URL2" placeholder="URL" required>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="Nombre">Control</label>
                        <input name="control"  type="text" class="form-control" id="control2" placeholder="Control" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Orden</label>
                        <input name="orden"  type="number" class="form-control" min="0" id="orden2" placeholder="Orden" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Icono </label>
                        <input name="icono" type="text" class="form-control" id="icono2" placeholder="Icono" required>
                    </div>
                    <div class="form-group">
                        <label for="emp_vigencia">Vigencia</label>
                        <select class="form-control" name="vigencia" id="vigencia">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>								  
                        </select>
                    </div>

                    <input type="hidden" name="padre" value="<?= $this->uri->segment(3) ?>">
                    <input type="hidden" name="id" id="id">
                   
                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Volver</button>
                        <button type="submit" class="btn btn-primary">Editar Funcionalidad </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
