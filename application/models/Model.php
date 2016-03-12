<?php

class Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getAll($data) {

        $consulta = $this->db->get("{$data}");

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    function getByID($data) {

        $consulta = $this->db->get_where("{$data['table']}", array("{$data['var']}" => $data['val']));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    function query($query) {
        $consulta = $this->db->query("{$query}");

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    function queryCampo($query) {
        //EJ: $this->Model->queryCampo("SELECT Icono AS 'Result' FROM Funcionalidad WHERE URL LIKE '%{$this->uri->segment(1)}/{$this->uri->segment(2)}%' ");
        $consulta = $this->db->query("{$query}");

        if ($consulta->num_rows() > 0) {
            return $consulta->result()[0]->Result;
        } else {
            return false;
        }
    }

    function Insert($T, $data) {

        $this->db->insert("{$T}", $data);
        return $this->db->insert_id();
    }

    function Modify($T, $W, $ID, $data) {
        $this->db->where("{$W}", "{$ID}");
        $this->db->update("{$T}", $data);
    }

    function Delete($T, $data) {
        return $this->db->delete("{$T}", $data);
    }

    function Menu() {
        $id = $this->session->userdata('DI');
        $consulta = $this->db->query(" SELECT DISTINCT 
                                                a.IDFuncionalidad,
                                                a.IDPadre,
                                                a.Nombre,
                                                a.URL,
                                                a.Control,
                                                a.Icono 
                                                FROM Funcionalidad a
                                                INNER JOIN RolFuncionalidad b
                                                ON a.IDFuncionalidad = b.IDFuncionalidad
                                                INNER JOIN Rol c
                                                ON b.IDRol = c.IDRol
                                                INNER JOIN UsuarioRol d
                                                ON c.IDRol = d.IDRol
                                                WHERE d.IDUsuario = {$id}
                                                AND a.Vigencia = 'SI'  
                                                ORDER BY a.Orden ASC ");

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    function getCampoTabla($campo, $tabla, $campo_id, $id) {

        $consulta = $this->db->query("	SELECT 	{$campo} AS 'Resultado'
						  	FROM 		{$tabla}
						  	WHERE 		{$campo_id} = '{$id}';
						 ");

        if ($consulta->num_rows() > 0) {
            return $consulta->result()[0]->Resultado;
        } else {
            return false;
        }
    }

    function walk($padre, $rol) {
        $funcionalidades = $this->query("SELECT * FROM Funcionalidad Where IDPadre = {$padre}");
        if(!$funcionalidades) {            return;}
        foreach ($funcionalidades as $f) {
            $exist = $this->query("SELECT IDRolFuncionalidad FROM RolFuncionalidad WHERE IDFuncionalidad = {$f->IDFuncionalidad} AND IDRol = {$rol}");
            $ck = ($exist[0] != '') ? 'checked' : '';
            if ($f->IDPadre == 0) {
                echo '<ul id="tree" name="tree">'
                . '<li class="treeview">'
                . '<input type="checkbox" name="p' . $f->IDFuncionalidad . '" value="' . $f->IDFuncionalidad . '" ' . $ck . ' /> '
                . '<i class="fa fa-' . $f->Icono . '"></i> '
                . '<span>' . $f->Nombre . '</span>'
                . '';
            } else {
                echo '<ul class="treeview-menu"><li>'
                . '<input type="checkbox" name="h' . $f->IDFuncionalidad . '" value="' . $f->IDPadre . '|' . $f->IDFuncionalidad . '" ' . $ck . '/> '
                . '<i class="fa fa-' . $f->Icono . '"></i> ' . $f->Nombre
                . '</li>';
            }
            
            if ($this->esPapi($f->IDFuncionalidad)) {
                $this->walk($f->IDFuncionalidad, $rol);
            }
            echo '</ul>';
        }
    }

    function esPapi($ID) {
        $datos = $this->query("SELECT * FROM Funcionalidad Where IDPadre = {$ID}");

        if ($datos) {
            return TRUE;
        } else {
            return false;
        }
    }

}

?>
