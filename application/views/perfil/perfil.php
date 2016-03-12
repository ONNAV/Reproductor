<?php
if ($perfil) {
    $perfil = $perfil[0];
    ?>
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
                Mi Perfil
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
                            <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/avatar/<?= $this->session->userdata('avatar'); ?>" alt="User profile picture">
                            <h3 class="profile-username text-center"><?= $perfil->Nick ?> - <?= $perfil->Nombre ?></h3>
                            <p class="text-muted text-center"><?= $perfil->Cargo ?></p>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                                <?= $perfil->Aboutme ?>
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
                                <?php
                                if ($perfil->Skills != '') {
                                    $skillsArray = explode(",", $perfil->Skills);
                                    foreach ($skillsArray as $s) {
                                        echo '<span class="label ' . randomColorLabel() . '"> ' . $s . '</span> ';
                                    }
                                }
                                ?>
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
                            <li><a href="#timeline" data-toggle="tab">Foto de Perfil</a></li>
                            <li><a href="#activity" data-toggle="tab">Ajustes</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <form class="form-horizontal" id="perfil" method="POST" action="Perfil/ModificarPerfil"
                                      data-fv-framework="bootstrap"
                                      data-fv-message="Valor no valido"
                                      data-fv-feedbackicons-valid="glyphicon glyphicon-ok"
                                      data-fv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                      data-fv-feedbackicons-validating="glyphicon glyphicon-refresh">

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Nombre" value="<?= $perfil->Nombre ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Nick</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nick" id="inputEmail" value="<?= $perfil->Nick ?>" placeholder="Nick" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="pass" id="inputName" value="<?= $perfil->Password ?>" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?= $perfil->Email ?>" required  data-fv-emailaddress-message="The input is not a valid email address" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Cargo</label>
                                        <div class="col-sm-10">
                                            <input type="cargo" class="form-control" name="cargo" id="inputEmail" placeholder="Cargo" required value="<?= $perfil->Cargo ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" name="about" placeholder="Descripcion" maxlength="1000"><?= $perfil->Aboutme ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="skills" id="inputSkills" placeholder="Skills" value="<?= $perfil->Skills ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer clearfix" style="border-top: 1px;">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-info">Modificar Datos</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.tab-pane -->
                            <div class=" tab-pane" id="activity">
                                <!-- Post -->
                                <form class="form-horizontal" method="POST" action="Perfil/ModificarPreferencias"
                                      data-fv-framework="bootstrap"
                                      data-fv-message="Valor no valido"
                                      data-fv-feedbackicons-valid="glyphicon glyphicon-ok"
                                      data-fv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                      data-fv-feedbackicons-validating="glyphicon glyphicon-refresh">

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Color Barra:</label>
                                        <div class="col-sm-10">
                                            <div class="input-group my-colorpicker2 colorpicker-element">
                                                <input type="text" class="form-control" name="colorSis" id="colorSis" value="<?= $this->session->userdata('Skin') ?>">

                                                <div class="input-group-addon">
                                                    <i id="istyle" class="estilo" style="background-color: rgb(242, 12, 12);"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="modal-footer clearfix" style="border-top: 1px;">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="sumbit" class="btn btn-info">Modificar Preferencias</button>
                                        </div>
                                    </div>
                                </form>

                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <form action="Perfil/ActualizarImagen" method="POST" enctype="multipart/form-data"
                                      data-fv-framework="bootstrap"
                                      data-fv-message="Valor no valido"
                                      data-fv-feedbackicons-valid="glyphicon glyphicon-ok"
                                      data-fv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                      data-fv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                    <div class="row invoice-info">
                                        <div class="col-sm-5 invoice-col">
                                            <label for="Pass">Avatar</label><br>
                                            <img src="<?= base_url(); ?>/assets/avatar/<?= $this->session->userdata('avatar'); ?>" style="max-width: 400px; max-height: 400px;" alt="User Image"/>
                                        </div>
                                        <div class="col-sm-5 invoice-col">
                                            <div id='botonera' class="botonera btn btn-success btn-sm">
                                                <span>Cambiar Imagen</span>
                                                <input id="archivo" type="file" class="upload" accept="image/*" name="userfile">
                                            </div>
                                            <input id="cancelar" type="button" class="btn btn-warning btn-sm" value="Cancelar">
                                            <div class="contenedor">
                                                <div class="titulo">
                                                    <span>Vista Previa:</span> 
                                                    <span id="infoNombre" style="display:none">[Seleccione una imagen]</span><br/>
                                                    <span id="infoTamaño" style="display:none"></span>
                                                </div>
                                                <div id="marcoVistaPrevia">
                                                    <img id="vistaPrevia" style="max-width: 400px; max-height: 400px;" name="userfile" src="" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer clearfix" style="border-top: 1px;">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="sumbit" class="btn btn-info">Modificar Foto</button>
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
    <script>
        $(document).ready(function () {
            $('#perfil').formValidation();
        });
    </script>
<?php } ?>