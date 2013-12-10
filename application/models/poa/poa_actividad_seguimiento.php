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
    
    public function obtenerDetalleActividadSeguimiento($codigo,$anio,$mes){
        $sql="SELECT A.poa_act_seg_desembolso
FROM $this->tabla A 
	INNER JOIN poa_actividad_detalle B ON A.poa_act_det_id=B.poa_act_det_id
	INNER JOIN poa_actividad C ON B.poa_act_id=C.poa_act_id
WHERE B.poa_act_det_anio=$anio AND C.poa_act_codigo='$codigo' AND A.poa_act_seg_mes=$mes";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado[0]->poa_act_seg_desembolso;
    }
    
    
}

?>
