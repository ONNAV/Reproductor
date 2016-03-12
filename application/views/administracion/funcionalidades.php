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
                <h3 class="box-title"><i class="fa fa-<?= $this->Model->queryCampo("SELECT Icono AS 'Result' FROM Funcionalidad WHERE URL LIKE '%{$this->uri->segment(1)}/{$this->uri->segment(2)}%' "); ?>"></i> Detalle Menu Funcionalidades</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-dropbox btn-sm" id="favorito" data-fav="<?= substr($_SERVER['PHP_SELF'], 11); ?>" onclick="fav(this)"><i class="fa fa-star"></i></button>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalagregar">Crear Funcionalidad</button>
                </div>
            </div>
            <div class="box-body">
                <table id="default" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="vertical-align: top;">Nombre</th>
                            <th style="vertical-align: top;">Control</th>
                            <th style="vertical-align: top;">Orden</th>
                            <th style="vertical-align: top;">Icono</th>
                            <th style="vertical-align: top;">Vigencia</th>
                            <th style="vertical-align: top;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($funcionalidades)
                            foreach ($funcionalidades as $f) {
                                ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url() ?>Administracion/Funcionalidades/<?= $f->IDFuncionalidad ?>">
                                            <?= $f->Nombre ?>
                                        </a>
                                    </td>
                                    <td><?= $f->Control ?></td>
                                    <td><?= $f->Orden ?></td>
                                    <td class="text-center"><i class="fa fa-<?= $f->Icono ?>"></i></td>
                                    <td class="text-center"><span class="badge <?= getColorEstado($f->Vigencia) ?>"><?= $f->Vigencia ?></span></td>
                                    <td class="text-center"><a name="edit" id="edit" data-toggle="modal" data-target="#modaleditar" onclick="EditarFuncionalidad(<?= $f->IDFuncionalidad ?>)"><i class="fa fa-pencil"></i></a></td>    
                            <input type="text" id="<?= $f->IDFuncionalidad ?>" value="<?= $f->Nombre . "|" . $f->URL . "|" . $f->Control . "|" . $f->Orden . "|" . $f->Icono . "|" . $f->Vigencia ?>" hidden="hidden"/>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box --->
    </section><!-- /.content -->
</aside><!-- /.right-side -->