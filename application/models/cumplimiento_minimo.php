<?php

/*
 * Contiene los metodos para acceder a la tabla CUMPLIMIENTO_MINIMO
 *
 * @author Ing. Karen Peñate
 */

class Cumplimiento_Minimo extends CI_Model {

    private $tabla = 'cumplimiento_minimo';
    
    public function obtenerCumplimientoMinimo($eta_id) {
        $this->db->where('eta_id',$eta_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
