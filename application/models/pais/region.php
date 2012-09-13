<?php

/*
 * Contiene los metodos para acceder a la tabla REGION
 *
 * @author Ing. Karen Peñate
 */

class Region extends CI_Model {

    private $tabla = 'region';

    public function obtenerRegiones() {
        $this->db->order_by('reg_id','asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
