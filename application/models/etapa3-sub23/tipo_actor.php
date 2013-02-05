<?php

/*
 * Contiene los metodos para acceder a la tabla TIPO_ACTOR
 *
 * @author Ing. Karen Peñate
 */

class Tipo_actor extends CI_Model {

    private $tabla = 'tipo_actor';

    public function obtenerTiposActor() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerNombreTiposActor($tip_act_id){
        $this->db->select('tip_act_nombre');
        $this->db->where('tip_act_id',$tip_act_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
