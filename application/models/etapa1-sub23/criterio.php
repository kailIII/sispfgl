<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO
 *
 * @author Ing. Karen Peñate
 */

class Criterio extends CI_Model {

    private $tabla = 'criterio';
    
    public function obtenerCriterios() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
