<aside class="right-side">
    <section class="content-header">
        <h1>
            <?=$this->uri->segment(1)?>
            <small><?=$this->uri->segment(2)?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-<?= $this->Model->getCampoTabla('Icono','Funcionalidad','Control',$this->uri->segment(1))?>"></i> <?=$this->uri->segment(1)?></a></li>
            <li class="active"> <?=$this->uri->segment(2)?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-<?=$this->Model->queryCampo("SELECT Icono AS 'Result' FROM Funcionalidad WHERE URL LIKE '%{$this->uri->segment(1)}/{$this->uri->segment(2)}%' ");?>"></i> Detalle Usuarios</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-dropbox btn-sm" id="favorito" data-fav="<?=substr($_SERVER['PHP_SELF'], 11);?>" onclick="fav(this)"><i class="fa fa-star"></i></button>
                    <a href="<?=  base_url()?>Administracion/AgregarUsuario"><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalagregar">Crear Usuario</button> </a>
                </div>
            </div>
            <div class="box-body">
                <table id="default" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="vertical-align: top;">Nombre</th>
                            <th style="vertical-align: top;">Email</th>
                            <th style="vertical-align: top;">Nick</th>
                            <th style="vertical-align: top;">Password</th>
                            <th style="vertical-align: top;">Estado</th>
                            <th style="vertical-align: top;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($usuarios)
                            foreach ($usuarios as $u) {
                                ?>
                                <tr>
                                    <td><?= $u->Nombre ?></td>
                                    <td><?= $u->Email ?></td>
                                    <td><?= $u->Nick ?></td>
                                    <td><?= substr($u->Password , 0, 4)?>******</td>
                                    <td class="text-center"><span class="badge <?=  getColorEstado($u->Estado)?>"><?= $u->Estado ?></span></td>
                                    <td class="text-center">
                                        <a href="<?=base_url()?>Administracion/PerfilUsuario/<?=$u->IDUsuario?>"><i class="fa fa-user"></i></a>
                                        &nbsp;
                                        <a data-toggle="modal" data-target="#modalrol" onclick="AsociarRoles(<?= $u->IDUsuario ?>)"><i class="fa fa-users"></i></a>
                                    </td>
                            </tr>
    <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box --->
    </section><!-- /.content -->
</aside><!-- /.right-side -->