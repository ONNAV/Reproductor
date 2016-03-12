<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        parent::isLoguedIn();
    }

    public function index() {
        $this->load->model('Model');
        $this->load->view('_layout');
        $this->load->view('index');
        $this->load->view('layout/_footer');
    }

}
