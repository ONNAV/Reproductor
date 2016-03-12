
    <link href="<?= base_url() ?>content/template/bootstrap-tagsinput/src/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>content/template/bootstrap-tagsinput/src/bootstrap-tagsinput.js"></script>
    <link href="<?= base_url() ?>content/template/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <style>
        .botonera {
            position: relative;
            overflow: hidden;
            margin: 10px;
        }
        .botonera input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

    </style>
    <style type="text/css">
        #perfil .has-error .control-label,
        #perfil .has-error .help-block,
        #perfil .has-error .form-control-feedback {
            color: #f39c12;
        }

        #perfil .has-success .control-label,
        #perfil .has-success .help-block,
        #perfil .has-success .form-control-feedback {
            color: #18bc9c;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                 Agregar Usuario
            </h1>
            <ol class="breadcrumb">
                <li class="active"> <?= $this->uri->segment(1) ?></li>
            </ol>
        </section>



        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/avatar/avatardefault.png" alt="User profile picture">
                            <h3 class="profile-username text-center"></h3>
                            <p class="text-muted text-center"></p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Descripcion</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i>  Algo acerca de mi</strong>
                            <p class="text-muted">
                                
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                            <p class="text-muted">
                                <?php

                                function ObtenerIP() {
                                    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
                                        $ip = getenv("HTTP_CLIENT_IP");
                                    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                                        $ip = getenv("HTTP_X_FORWARDED_FOR");
                                    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                                        $ip = getenv("REMOTE_ADDR");
                                    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                                        $ip = $_SERVER['REMOTE_ADDR'];
                                    else
                                        $ip = "IP desconocida";
                                    return($ip);
                                }

                                echo ObtenerIP();
                                ?>


                            </p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                            <p>
                               
                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#settings" data-toggle="tab">Datos</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <form class="form-horizontal" id="perfil" method="POST" action="<?=base_url()?>Administracion/CrearUsuario"
                                      data-fv-framework="bootstrap"
                                      data-fv-message="Valor no valido"
                                      data-fv-feedbackicons-valid="glyphicon glyphicon-ok"
                                      data-fv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                      data-fv-feedbackicons-validating="glyphicon glyphicon-refresh">

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Nombre"  required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Nick</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nick" id="inputEmail" placeholder="Nick" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="pass" id="inputName"  placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" equired  data-fv-emailaddress-message="The input is not a valid email address" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-10">
                                            <input type="cargo" class="form-control" name="cargo" id="inputEmail" placeholder="Cargo" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" name="about" placeholder="Descripcion" maxlength="1000"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="skills" id="inputSkills" placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group" style="display:none">
                                        <label for="inputSkills" class="col-sm-2 control-label">Acceso Al Sistema</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="vigencia" id="vigencia">
                                                <option selected>Vigente</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer clearfix" style="border-top: 1px;">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="<?=base_url()?>Administracion/Usuarios"><button type="button" class="btn btn-danger">Volver</button></a>
                                            
                                            <button type="submit" class="btn btn-info">Agregar Usuario</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.tab-pane -->


                        </div><!-- /.tab-content -->
                    </div><!-- /.nav-tabs-custom -->
                </div><!-- /.col -->
            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script>$('#inputSkills').tagsinput({trimValue: true});</script>
    <script src="<?= base_url() ?>content/template/plugins/colorpicker/bootstrap-colorpicker.js"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>$(".my-colorpicker2").colorpicker();</script>
    <script>ImagenProfile();</script>
