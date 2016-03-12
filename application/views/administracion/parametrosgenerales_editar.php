<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus-square"></i> Gestion Par Valor</h4>
            </div>
            <form role="form" action="<?=  base_url()?>Administracion/ModificarParametrosGenerales" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Email">Valor 1 </label>
                        <input name="v11" type="text" class="form-control" id="v11" placeholder="Valor 1" required="required">
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 2 </label>
                        <input name="v22" type="text" class="form-control" id="v22" placeholder="Valor 2">
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 3 </label>
                        <input name="v33" type="text" class="form-control" id="v33" placeholder="Valor 3">
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 4 </label>
                        <input name="v44" type="text" class="form-control" id="v44" placeholder="Valor 4">
                    </div>
                    <div class="form-group">
                        <label for="Email">Valor 5 </label>
                        <input name="v55" type="text" class="form-control" id="v55" placeholder="Valor 5">
                    </div>
                    <div class="form-group">
                        <label for="emp_vigencia">Estado</label>
                        <select class="form-control" name="vigencia" id="vigencia">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>								  
                        </select>
                    </div>

                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="padre" value="<?= $this->uri->segment(3) ?>">
                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Volver</button>
                        <button type="submit" class="btn btn-primary" id="mod" name="mod">Modificar Parametro General </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
