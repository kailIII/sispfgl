<?php

/*
 * Contiene los metodos para acceder a la tabla CONTRAPARTIDA
 *
 * @author Ing. Karen Peñate
 */

class Contrapartida extends CI_Model {

    private $tabla = 'contrapartida';
    
    public function obtenerContrapartidas() {
        $this->db->order_by('con_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
