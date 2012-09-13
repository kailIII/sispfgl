<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO
 *
 * @author Ing. Karen Peñate
 */

class Participante extends CI_Model {

    private $tabla = 'participante';
    
    public function obtenerParticipantes() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
