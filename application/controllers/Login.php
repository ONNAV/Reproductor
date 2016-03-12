<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    function index() {
        $this->load->view('login/login');
    }

    function validarCredenciales() {

        $data['Password'] = md5($this->input->post('usu_pass'));
        $data['Email'] = $this->input->post('usu_email');
        $data['Estado'] = 'Vigente';

        $u = $this->LoginModel->ValidarCredenciales($data);

        if ($u) {
            $this->load->model('Model');

            $data['email'] = $u->Email;
            $data['DI'] = $u->IDUsuario;
            $data['avatar'] = $u->Avatar;
            $data['Nombre'] = $u->Nombre;
            $data['Nick'] = $u->Nick;
            $data['Creacion'] = $u->FechaCreacion;
            $data['ON'] = true;

            $this->session->set_userdata($data);

            redirect('Inicio');
        } else {
            redirect('Login?rdr_1');
        }
    }

    function logOut() {

        $this->session->sess_destroy();
        redirect('Login');
    }

    function Remember() {
        $this->load->view('remember');
    }

    function EnviarPass() {
        $email = $this->input->post("usu_email");

        $datos = $this->Login_model->validarEmail($email);

        if ($datos) {

            $asunto = "Envio Contraseña";
            $titulo1 = "SoluTicket";
            $titulo2 = "Envio Contraseña";
            $cuerpo = $datos->usu_nombre . ", Solicito un envio de contraseña <br> Su contraseña es la siguiente: " . $datos->usu_pass;

            $this->EnviarCorreo($datos->usu_email, $datos->usu_nombre, $asunto, $titulo1, $titulo2, $cuerpo);

            redirect('Login?rdr_3');
        } else {
            redirect('Login/Remember?rdr_4');
        }
    }

}

?>