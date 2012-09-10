<?php

/*
 * Contiene los metodos para acceder a la tabla CONSULTORA
 *
 * @author Ing. Karen Peñate
 */

class Consultora extends CI_Model {

    private $tabla = 'consultora';

    public function obtenerConsultora() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function ultimoCodigo() {
        $this->db->select_max('cons_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
