<?php

/*
 * Contiene los metodos para acceder a la tabla CONSULTOR
 *
 * @author Ing. Karen Peñate
 */

class Consultor extends CI_Model {

    private $tabla = 'consultor';
    
    public function obtenerConsultores() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
}

?>
