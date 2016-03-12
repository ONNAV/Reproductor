<?php

class LoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function ValidarCredenciales($data) {
        $this->load->model('Model');
        $query = $this->db->get_where('Usuarios', $data);
        //return $this->Model->getByID($data);
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return false;
        }
    }

    function ValidarEmail($email) {

        $query = $this->db->get_where('par_usuarios', array('usu_email' => $email));

        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return false;
        }
    }

}

?>