<?php

/*
 * Contiene los metodos para acceder a la tabla INSTITUCION
 *
 * @author Ing. Karen Peñate
 */

class Institucion extends CI_Model {

    private $tabla = 'institucion';

    public function obtenerInstitucion() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerNombreInstitucion($ins_id){
        $this->db->select('ins_nombre ');
        $this->db->where('ins_id',$ins_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
