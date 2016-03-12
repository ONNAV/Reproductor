
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Favoritos

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-star"></i> Favoritos</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Soluciones que suman</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>

                        </div>
                    </div>

                    <div class="box-body">
                        <img src="<?= $this->session->userdata('logo'); ?>"  class="img-responsive center-block" alt="Igniter">
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div> 


            <!--/.direct-chat -->

            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-info collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Members</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-info">8 Latest Members</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding" style="display: none;">
                        <ul class="users-list clearfix">
                            <?php
                            $usuarios = $this->Model->query("SELECT * FROM Usuarios ORDER BY IDUsuario DESC LIMIT 8;");
                            if ($usuarios)
                                foreach ($usuarios as $u) {

                                    echo '<li>
                                    <img src="./assets/avatar/' . $u->Avatar . '" alt="User Image">
                                    <a class="users-list-name" href="#">' . $u->Nombre . '</a>
                                </li>';
                                }
                            ?>
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>

            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-info collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-star"></i> Favoritos</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding" style="display: none;">
                        <ul class="users-list clearfix">
                            <?php
                            $favs = $this->Model->query("SELECT * FROM Funcionalidad a INNER JOIN Favoritos b ON a.IDFuncionalidad = b.IDFuncionalidad WHERE b.IDUsuario = {$this->session->userdata('DI')}  ORDER BY b.FechaCreacion DESC LIMIT 8;");
                            if ($favs)
                                foreach ($favs as $f) {
                                $control = explode('/', $f->URL);
                                $ico = $this->Model->getCampoTabla('Icono','Funcionalidad','URL', $control[0].'/'.$control[1]);
                                $icono = ($ico != '') ? $ico : $f->Icono;
                                
                                    echo '<li>
                                    <i class="fa fa-' . $icono . ' fa-5x"></i>
                                    <a class="users-list-name" href="' . base_url() . $f->URL . '">' . $f->Nombre . '</a>
                                    <span class="users-list-date">'.$control[1].'</span>
                                </li>';
                                }
                            ?>
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>

        </div><!--row-->
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->


