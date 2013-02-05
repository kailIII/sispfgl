<?php

/*
 * Contiene los metodos para acceder a la tabla nombre_fecha_aprobacion
 *
 * @author Ing. Karen Peñate
 */

class Nombre_fecha_aprobacion extends CI_Model {

    private $tabla = 'nombre_fecha_aprobacion';
    
    public function obtenerNombresFechas() {
        $this->db->order_by('nom_fec_apr_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
