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
                <h3 class="box-title"><i class="fa fa-<?=$this->Model->queryCampo("SELECT Icono AS 'Result' FROM Funcionalidad WHERE URL LIKE '%{$this->uri->segment(1)}/{$this->uri->segment(2)}%' ");?>"></i> Detalle Parametros Generales</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-dropbox btn-sm" id="favorito" data-fav="<?=substr($_SERVER['PHP_SELF'], 11);?>" onclick="fav(this)"><i class="fa fa-star"></i></button>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalagregar">Crear Parametro General</button>
                </div>
            </div>
            <div class="box-body">
                <table id="default" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <?php if($this->uri->segment(3) == 0){ ?>
                            <th style="vertical-align: top;">Valor 1</th>
                            <th style="vertical-align: top;">Valor 2</th>
                            <th style="vertical-align: top;">Valor 3</th>
                            <th style="vertical-align: top;">Valor 4</th>
                            <th style="vertical-align: top;">Valor 5</th>
                            <th style="vertical-align: top;">Vigencia</th>
                            <th style="vertical-align: top;">Opciones</th>
                            <?php } else { ?>
                            <th style="vertical-align: top;"><?= $this->Model->getCampoTabla('Valor1', 'ParametrosGenerales', 'ID', $this->uri->segment(3)) ?></th>
                            <th style="vertical-align: top;"><?= $this->Model->getCampoTabla('Valor2', 'ParametrosGenerales', 'ID', $this->uri->segment(3)) ?></th>
                            <th style="vertical-align: top;"><?= $this->Model->getCampoTabla('Valor3', 'ParametrosGenerales', 'ID', $this->uri->segment(3)) ?></th>
                            <th style="vertical-align: top;"><?= $this->Model->getCampoTabla('Valor4', 'ParametrosGenerales', 'ID', $this->uri->segment(3)) ?></th>
                            <th style="vertical-align: top;"><?= $this->Model->getCampoTabla('Valor5', 'ParametrosGenerales', 'ID', $this->uri->segment(3)) ?></th>
                            <th style="vertical-align: top;">Vigencia</th>
                            <th style="vertical-align: top;">Opciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($pg)
                            foreach ($pg as $p) {
                                ?>
                                <tr>
                                    <td>
                                        <?php if ($this->uri->segment(3) == 0) { ?>
                                            <a href="<?= base_url() ?>Administracion/ParametrosGenerales/<?= $p->ID ?>">
                                                <?= $p->Valor1 ?>
                                            </a>
                                        <?php } else { ?>
                                            <?= $p->Valor1 ?>
                                        <?php } ?>
                                    </td>
                                    <td><?= $p->Valor2 ?></td>
                                    <td><?= $p->Valor3 ?></td>
                                    <td><?= $p->Valor4 ?></td>
                                    <td><?= $p->Valor5 ?></td>
                                    <td class="text-center"><span class="badge <?=  getColorEstado($p->Vigencia)?>"><?= $p->Vigencia ?></span></td>
                                    <td class="text-center"><a name="edit" id="edit" data-toggle="modal" data-target="#modaleditar" onclick="EditarPGeneral(<?= $p->ID ?>)"><i class="fa fa-pencil"></i></a></td>    
                                    <input type="text" id="<?= $p->ID ?>" value="<?= $p->Valor1 . "|" . $p->Valor2 . "|" . $p->Valor3 . "|" . $p->Valor4 . "|" . $p->Valor5 . "|" . $p->Vigencia?>" hidden="hidden"/>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box --->
    </section><!-- /.content -->
</aside><!-- /.right-side -->