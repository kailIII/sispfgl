<?php

/*
 * Contiene los metodos para acceder a la tabla obra
 *
 * @author Ing. Karen Peñate
 */

class Obra extends CI_Model {

    private $tabla = 'obra';

    public function obtenerObras() {
        $this->db->order_by('obr_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
}

?>
