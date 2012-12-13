<?php

/*
 * Contiene los metodos para acceder a la tabla AREA_DIMENSION
 *
 * @author Ing. Karen Peñate
 */

class Area_dimension extends CI_Model {

    private $tabla = 'area_dimension';

    public function obtenerAreaDimension() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerNombreAreaDimension($are_dim_id){
        $this->db->select('are_dim_nombre');
        $this->db->where('are_dim_id',$are_dim_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
