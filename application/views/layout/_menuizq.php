<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/avatar/<?= $this->session->userdata('avatar'); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('Nick'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less  sidebar-collapse-->
        <ul class="sidebar-menu">
            <li class="header">MODULOS</li>
                <?php
                $menu = '';
                $menuUsuario = $this->Model->Menu();
                if ($menuUsuario)
                    foreach ($menuUsuario as $p) {
                        if ($p->IDPadre == 0) {
                            $menu .= '<li class="treeview ' . getActiveTree($this->uri->segment(1), $p->Control) . '  ">'
                                    . '<a href="">'
                                    . ' <i class="fa fa-' . $p->Icono . '"></i> '
                                    . '<span>' . $p->Nombre . '</span>'
                                    . '<i class="fa fa-angle-left pull-right"></i> <i class="fa fa-angle-left pull-right"></i></a>'
                                    . '<ul class="treeview-menu">';

                            foreach ($menuUsuario as $h) {
                                if ($h->IDPadre == $p->IDFuncionalidad) {
                                    $menu .= '<li  ' . getActiveMenu($h->Control, $this->uri->segment(2)) . ' ><a href="' . base_url() . $h->URL . '"> <i class="fa fa-' . $h->Icono . '"></i> ' . $h->Nombre . '</a></li>';
                                }
                            }
                            $menu .= '</ul></li>';
                        }
                    }
                echo $menu;
                ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- =============================================== -->
