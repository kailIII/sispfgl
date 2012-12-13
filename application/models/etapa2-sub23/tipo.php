<?php

/*
 * Contiene los metodos para acceder a la tabla TIPO
 *
 * @author Ing. Karen Peñate
 */

class Tipo extends CI_Model {

    private $tabla = 'tipo';

    public function obtenerTipos() {
        $this->db->order_by('tip_id','asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
