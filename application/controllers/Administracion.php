<?php

class Administracion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        parent::isLoguedIn();
        //parent::access();
        $this->load->model('Model');
    }

    function index() {
        $this->load->view('_layout');
        $this->load->view('404.html');
        $this->load->view('layout/_footer');
    }

    function Favorito() {
        $control = explode('/', $this->input->post('id'));
        $ID = $this->Model->getCampoTabla('IDFuncionalidad', 'Funcionalidad', 'Control', $control[0]);
        $data = array('IDUsuario' => $this->session->userdata('DI'), 'URL' => $this->input->post('id'), 'IDFuncionalidad' => $ID);
        $this->Model->Insert('Favoritos', $data);
    }

    function Usuarios() {
        if ($this->access()) {
            $datos['usuarios'] = $this->Model->getAll('Usuarios');

            $this->load->view('_layout');
            $this->load->view('administracion/usuarios', $datos);
            $this->load->view('administracion/usuarios_roles');
            $this->load->view('layout/_footer');
        }
    }

    function Funcionalidades($ID) {
        if ($this->access()) {
            $data['table'] = 'Funcionalidad';
            $data['var'] = 'IDPadre';
            $data['val'] = $ID;
            $datos['funcionalidades'] = $this->Model->getByID($data);

            $this->load->view('_layout');
            $this->load->view('administracion/funcionalidades', $datos);
            $this->load->view('administracion/funcionalidades_crear');
            $this->load->view('administracion/funcionalidades_editar');
            $this->load->view('layout/_footer');
        }
    }

    function AgregarFuncionalidad() {
        $data = array(
            'IDPadre' => $this->input->post('padre'),
            'Nombre' => $this->input->post('nombre'),
            'URL' => $this->input->post('URL'),
            'Control' => $this->input->post('control'),
            'Orden' => $this->input->post('orden'),
            'Icono' => $this->input->post('icono')
        );

        $this->Model->Insert('Funcionalidad', $data);
        redirect('Administracion/Funcionalidades/' . $this->input->post('padre'));
    }

    function ModificarFuncionalidad() {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'URL' => $this->input->post('URL'),
            'Control' => $this->input->post('control'),
            'Orden' => $this->input->post('orden'),
            'Icono' => $this->input->post('icono'),
            'Vigencia' => $this->input->post('vigencia')
        );

        $this->Model->Modify('Funcionalidad', 'IDFuncionalidad', $this->input->post('id'), $data);
        redirect('Administracion/Funcionalidades/' . $this->input->post('padre'));
    }

    function Roles() {
        if ($this->access()) {
            $datos['roles'] = $this->Model->getAll('Rol');

            $this->load->view('_layout');
            $this->load->view('administracion/roles', $datos);
            $this->load->view('administracion/roles_agregar');
            $this->load->view('administracion/roles_editar');
            $this->load->view('layout/_footer');
        }
    }

    function AgregarRol() {
        $data = array(
            'Codigo' => $this->input->post('cod'),
            'Descripcion' => $this->input->post('desc')
        );
        $this->Model->Insert('Rol', $data);

        redirect('Administracion/Roles');
    }

    function ModificarRol() {
        $data = array(
            'Codigo' => $this->input->post('cod'),
            'Descripcion' => $this->input->post('desc'),
            'Vigencia' => $this->input->post('vigencia')
        );
        $this->Model->Modify('Rol', 'IDRol', $this->input->post('id'), $data);

        redirect('Administracion/Roles');
    }

    function FuncionalidadesRol($rol) {

        $this->load->view('_layout');
        $this->load->view('administracion/funcionalidades_rol');
        $this->load->view('layout/_footer');
    }

    function ModificarRolFuncionalidades() {
        //echo min(array('p2', 'p4', 'p5')); // 2 
        $this->Model->Delete("RolFuncionalidad", array('IDRol' => $this->input->post('rol')));

        for ($p = 1; $p < 100; $p++) {
            if (isset($_REQUEST['p' . $p])) {
                $padre = $_REQUEST['p' . $p];
                for ($i = 1; $i < 100; $i++) {
                    if (isset($_REQUEST['h' . $i])) {
                        $valor = $_REQUEST['h' . $i];
                        $porciones = explode("|", $valor);
                        if ($padre == $porciones[0]) {
                            $data = array('IDRol' => $this->input->post('rol'), 'IDFuncionalidad' => $porciones[1]);
                            $this->Model->Insert('RolFuncionalidad', $data);
                        }
                    }
                }
                $data = array('IDRol' => $this->input->post('rol'), 'IDFuncionalidad' => $padre);
                $this->Model->Insert('RolFuncionalidad', $data);
            }
        }
        redirect('Administracion/FuncionalidadesRol/' . $this->input->post('rol'));
    }

    function ParametrosGenerales($ID) {

        if ($this->access()) {
            $data['table'] = 'ParametrosGenerales';
            $data['var'] = 'IDPadre';
            $data['val'] = $ID;
            $datos['pg'] = $this->Model->getByID($data);

            $this->load->view('_layout');
            $this->load->view('administracion/parametrosgenerales', $datos);
            $this->load->view('administracion/parametrosgenerales_agregar');
            $this->load->view('administracion/parametrosgenerales_editar');
            $this->load->view('layout/_footer');
        }
    }

    function AgregarParametrosGenerales() {
        $data = array(
            'IDPadre' => $this->input->post('padre'),
            'Valor1' => $this->input->post('v1'),
            'Valor2' => $this->input->post('v2'),
            'Valor3' => $this->input->post('v3'),
            'Valor4' => $this->input->post('v4'),
            'Valor5' => $this->input->post('v5')
        );

        $this->Model->Insert('ParametrosGenerales', $data);
        redirect('Administracion/ParametrosGenerales/' . $this->input->post('padre'));
    }

    function ModificarParametrosGenerales() {
        $data = array(
            'Valor1' => $this->input->post('v11'),
            'Valor2' => $this->input->post('v22'),
            'Valor3' => $this->input->post('v33'),
            'Valor4' => $this->input->post('v44'),
            'Valor5' => $this->input->post('v55'),
            'Vigencia' => $this->input->post('vigencia')
        );

        $this->Model->Modify('ParametrosGenerales', 'ID', $this->input->post('id'), $data);
        redirect('Administracion/ParametrosGenerales/' . $this->input->post('padre'));
    }

    function ObtenerRolesUsuario() {
        $resultado['asociados'] = $this->Model->query("SELECT
						a.IDUsuario
					  ,b.Codigo
					  ,b.Descripcion
					  ,b.IDRol
                                        FROM UsuarioRol a
                                        INNER JOIN Rol b ON a.IDRol = b.IDRol
                                        WHERE a.IDUsuario = {$this->input->post('id')}");
        $response = "";

        if ($resultado['asociados'])
            foreach ($resultado['asociados'] as $r) {
                $response .= $r->IDRol . '|' . $r->Codigo . '|' . $r->Descripcion . ';';
            }

        echo $response;
    }

    function ObtenerRolesUsuarioSA() {
        $resultado['asociados'] = $this->Model->query("SELECT
							x.IDRol
							, x.Codigo
							, x.Descripcion
						  FROM Rol x
						  WHERE x.Vigencia = 'SI'
						  AND x.IDRol NOT IN (SELECT b.IDRol
						  FROM Usuarios a
						  INNER JOIN UsuarioRol b
						  on a.IDUsuario = b.IDUsuario
						  WHERE a.IDUsuario = {$this->input->post('id')})");


        $response = "";

        if ($resultado['asociados'])
            foreach ($resultado['asociados'] as $r) {
                $response .= $r->IDRol . '|' . $r->Codigo . '|' . $r->Descripcion . ';';
            }

        echo $response;
    }

    function EliminarRelacionRolUsuario() {
        $this->Model->Delete("UsuarioRol", array('IDUsuario' => $this->input->post('id')));
    }

    function CrearRelacionRU() {
        $data = array("IDRol" => $this->input->post('rol'), "IDUsuario" => $this->input->post('id'));
        $this->Model->Insert('UsuarioRol', $data);
    }

    function PerfilUsuario($id) {
        $data['table'] = 'Usuarios';
        $data['var'] = 'IDUsuario';
        $data['val'] = $id;

        $datos['perfil'] = $this->Model->getByID($data);

        $this->load->view('_layout');
        $this->load->view('administracion/usuarios_perfil', $datos);
        $this->load->view('layout/_footer');
    }

    function AgregarUsuario() {
        $data['table'] = 'Usuarios';
        $data['var'] = 'IDUsuario';
        $data['val'] = 0;

        $datos['perfil'] = $this->Model->getByID($data);

        $this->load->view('_layout');
        $this->load->view('administracion/usuarios_agregar', $datos);
        $this->load->view('layout/_footer');
    }

    function CrearUsuario() {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'Nick' => $this->input->post('nick'),
            'Password' => md5($this->input->post('pass')),
            'Email' => $this->input->post('email'),
            'Cargo' => $this->input->post('cargo'),
            'Email' => $this->input->post('email'),
            'Aboutme' => $this->input->post('about'),
            'Skills' => $this->input->post('skills'),
            'Estado' => $this->input->post('vigencia')
        );

        $id = $this->Model->Insert('Usuarios', $data);
        $this->Model->Insert('Preferencias', array('IDUsuario' => $id));


        redirect('Administracion/PerfilUsuario/' . $id);
    }

    function ModificarPerfil() {

        $pass = $this->Model->getCampoTabla('Password', 'Usuarios', 'IDUsuario', $this->input->post('id'));
        $nueva = ($this->input->post('pass') == $pass) ? $pass : md5($this->input->post('pass'));

        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'Nick' => $this->input->post('nick'),
            'Password' => $nueva,
            'Email' => $this->input->post('email'),
            'Cargo' => $this->input->post('cargo'),
            'Email' => $this->input->post('email'),
            'Aboutme' => $this->input->post('about'),
            'Skills' => $this->input->post('skills'),
            'Estado' => $this->input->post('vigencia')
        );

        $this->Model->Modify('Usuarios', 'IDUsuario', $this->input->post('id'), $data);

        redirect('Administracion/PerfilUsuario/' . $this->input->post('id'));
    }

    function ModificarPreferencias() {

        $data = array('ColorSkin' => $this->input->post('colorSis'));
        $this->Model->Modify('Preferencias', 'IDUsuario', $this->input->post('id'), $data);

        redirect('Administracion/PerfilUsuario/' . $this->input->post('id'));
    }

    function ActualizarImagen() {
        $config['upload_path'] = "./assets/avatar/";
        $config['file_name'] = $this->input->post('id') . '_' . basename($_FILES["userfile"]["name"]);
        $config['overwrite'] = TRUE;
        $config["allowed_types"] = 'jpg|jpeg|png|gif';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['Avatar'] = $this->input->post('id');
            $this->Model->Modify('Usuarios', 'IDUsuario', $this->input->post('id'), $data);
            redirect('Administracion/PerfilUsuario/' . $this->input->post('id'));
        } else {
            $data = $this->upload->data();
            $datos['Avatar'] = $data{'file_name'};
            $this->Model->Modify('Usuarios', 'IDUsuario', $this->input->post('id'), $datos);

            redirect('Administracion/PerfilUsuario/' . $this->input->post('id'));
        }
    }

}

?>