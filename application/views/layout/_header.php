<header class="main-header">
    <a href="<?= base_url(); ?>Inicio" class="logo" id="bglogo" style="background-color: <?= $this->session->userdata('Skin') ?>;">

        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b> <?= substr($this->session->userdata('NombreMini'), 0, 1) ?></b><?= substr($this->session->userdata('NombreMini'), 1) ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?= $this->session->userdata('NombreSistema'); ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation" id="bgnav" style="background-color: <?= $this->session->userdata('Skin') ?>">
        <!-- Sidebar toggle button-->
        <a class="sidebar-toggle" data-toggle="offcanvas" id="bga" role="button" style="background-color: <?= $this->session->userdata('Skin') ?>;" data-col="<?= $this->Model->getCampoTabla('CollapseMenu', 'Preferencias', 'IDUsuario', $this->session->userdata('DI')) ?>" onclick="sidebar(this)">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a> 

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url() ?>assets/avatar/<?= $this->session->userdata('avatar'); ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= $this->session->userdata('Nick'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" id="bguser" style="background-color: <?= $this->session->userdata('Skin') ?>">
                            <img src="<?= base_url() ?>assets/avatar/<?= $this->session->userdata('avatar'); ?>" class="img-circle" alt="User Image" />
                            <p>
                                <span class="hidden-xs"> <?= $this->session->userdata('Nick'); ?> - <?= $this->session->userdata('Nombre'); ?></span>
                                <small>Miembro desde <?= $this->session->userdata('Creacion'); ?> </small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!--<li class="user-body">
                          <div class="col-xs-4 text-center">
                            <a href="#">·</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">·</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">·</a>
                          </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url() ?>Perfil" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url() ?>Login/logOut" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>