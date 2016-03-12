<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesion</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?= base_url() ?>content/template/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>content/template/font-awesome/css/font-awesome.min.css" />
        <!-- Theme style -->
        <link href="<?= base_url() ?>content/template/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?= base_url() ?>content/template/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url() ?>content/template/alertify/css/alertify.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>content/template/alertify/css/themes/bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <h1>CoreIgniter
                    <br>
                    <small>
                        ZEBRA
                    </small>
                </h1>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Entra para iniciar sesion</p>
                <?php
                echo form_open('Login/ValidarCredenciales');
                ?>
                <!-- <form class="col-md-12" action="validarCredenciales" method="POST"> -->

                <div class="form-group has-feedback">

                    <input type="email" class="form-control" placeholder="Email" name ="usu_email" id="usu_email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">

                    <input type="password" class="form-control" placeholder="Password" name="usu_pass" id="usu_pass"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">    
                        <div class="checkbox icheck">
                            <label>

                            </label>
                        </div>                        
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

                    </div><!-- /.col -->
                </div>
                </form>



                <a href= "<?= base_url() ?>/Login/Remember">No recuerdo mi contraseña</a><br>


            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <?php if (isset($_REQUEST['rdr_0'])) { ?>
            <input type="hidden" id="rdr" value="0" />
        <?php } else if (isset($_REQUEST['rdr_1'])) { ?>		  
            <input type="hidden" id="rdr" value="1" />		  
        <?php } else if (isset($_REQUEST['rdr_3'])) { ?>
            <input type="hidden" id="rdr" value="3" />		  
        <?php } else if (isset($_REQUEST['rdr_4'])) { ?>
            <input type="hidden" id="rdr" value="4" />		  
        <?php } ?>	  

        <!-- jQuery 2.1.3 
        <script src="../../../../plugins/jQuery/jQuery-2.1.3.min.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>content/template/plugins/jQuery/jquery-1.10.2.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?= base_url() ?>content/template/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?= base_url() ?>content/template/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- include alertify script -->

        <script src="<?= base_url() ?>content/template/alertify/js/alertify.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });

            $(document).ready(function () {
                if ($("#rdr").val() == "1") {
                    alertify.error('Credenciales incorrectas.');
                }
                if ($("#rdr").val() == "3") {
                    alertify.success('Se envio la contraseña a tu correo');
                }
                if ($("#rdr").val() == "4") {
                    alertify.error('Ocurrio un error al enviar la contraseña. <b>Revisa si estas registrado con ese correo</b>');
                }

            });
        </script>
    </body>
</html>