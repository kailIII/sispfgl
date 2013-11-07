<?php

/*
 * Contiene los metodos para acceder a la tabla poa_actividad_seguimiento
 *
 * @author Ing. Karen Peñate
 */

class Poa_actividad_seguimiento extends CI_Model {
    
     private $tabla = 'poa_actividad_seguimiento';
     
     public function obtenerSeguimientoActividad($poa_act_det_id) {
        $this->db->where('poa_act_det_id',$poa_act_det_id);
        $this->db->order_by('poa_act_seg_mes');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    
}

?>
