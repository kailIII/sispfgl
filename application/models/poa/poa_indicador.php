<?php

/*
 * Contiene los metodos para acceder a la tabla poa_componente
 *
 * @author Ing. Karen Peñate
 */

class Poa_indicador extends CI_Model {

    private $tabla = 'poa_indicador';

    public function obtenerIndicadoresComponenteTipo($poa_com_id,$poa_ind_tipo) {
        $this->db->where('poa_com_id',$poa_com_id);
        $this->db->where('poa_ind_tipo',$poa_ind_tipo);
        $this->db->order_by('poa_ind_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    
    
}

?>
