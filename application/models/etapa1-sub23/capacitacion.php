<?php

/*
 * Contiene los metodos para acceder a la tabla CAPACITACION
 *
 * @author Ing. Karen Peñate
 */

class Capacitacion extends CI_Model {

    private $tabla = 'capacitacion';
    
    public function obtenerCapacitaciones($pro_pep_id) {
        $this->db->where('pro_pep_id',$pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
