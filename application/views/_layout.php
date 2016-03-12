<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php $this->load->view('layout/_head'); ?>
    </head>
    <body class="sidebar-mini skin-green-light <?=$this->Model->getCampoTabla('CollapseMenu', 'Preferencias', 'IDUsuario', $this->session->userdata('DI')) ?>">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php $this->load->view('layout/_header'); ?>
            <?php $this->load->view('layout/_menuizq'); ?>

