<aside class="right-side">
    <section class="content-header">
        <h1>
            <?= $this->uri->segment(1) ?>
            <small><?= $this->uri->segment(2) ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-<?= $this->Model->getCampoTabla('Icono', 'Funcionalidad', 'Control', $this->uri->segment(1)) ?>"></i> <?= $this->uri->segment(1) ?></a></li>
            <li class="active"> <?= $this->uri->segment(2) ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-<?= $this->Model->queryCampo("SELECT Icono AS 'Result' FROM Funcionalidad WHERE URL LIKE '%{$this->uri->segment(1)}/{$this->uri->segment(2)}%' "); ?>"></i> Detalle Rol Funcionalidades</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-dropbox btn-sm" id="favorito" data-fav="<?= substr($_SERVER['PHP_SELF'], 11); ?>" onclick="fav(this)"><i class="fa fa-star"></i></button>
                </div>
            </div>
            <form action="<?= base_url() ?>Administracion/ModificarRolFuncionalidades" method="POST">
                <div class="box-body">

                    <?php $this->Model->walk(0, $this->uri->segment(3)); ?>

                </div><!-- /.box-body -->
                <div class="modal-footer clearfix">
                    <input type="hidden" name="rol" value="<?= $this->uri->segment(3) ?>"/>
                    <a href="<?= base_url() ?>Administracion/Roles"><button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button> </a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div><!-- /.box --->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

<script src="<?= base_url() ?>content/template/plugins/jQueryCheckTree/jquery-checktree.js"></script>
<link href="<?= base_url() ?>content/template/plugins/jQueryCheckTree/css/jquery-checktree.css" rel="stylesheet" type="text/css" />
<script>$('ul#tree').checktree();</script>