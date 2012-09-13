<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO
 *
 * @author Ing. Karen Peñate
 */

class Cumplimiento_Minimo extends CI_Model {

    private $tabla = 'cumplimiento_minimo';
    
    public function obtenerCumplimientoMinimo() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
