<?php

/*
 * Contiene los metodos para acceder a la tabla CONTRAPARTIDA
 *
 * @author Ing. Karen Peñate
 */

class Contrapartida extends CI_Model {

    private $tabla = 'contrapartida';
    
    public function obtenerContrapartidas() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
