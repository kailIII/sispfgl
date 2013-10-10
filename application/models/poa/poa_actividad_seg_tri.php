<?php

/*
 * Contiene los metodos para acceder a la tabla poa_actividad_seg_tri
 *
 * @author Ing. Karen Peñate
 */

class Poa_actividad_seg_tri extends CI_Model {

    private $tabla = 'poa_actividad_seg_tri';

    public function obtenerActividadDetalleTri($anio, $poa_com_id,$trimestre) {
        $sql = "SELECT COUNT(C.poa_act_det_id) valor
FROM poa_actividad A, poa_actividad_detalle B, $this->tabla C
WHERE A.poa_act_id=B.poa_act_id AND B.poa_act_det_id=C.poa_act_det_id
	AND A.poa_com_id=? AND B.poa_act_det_anio = ? AND C.poa_act_seg_tri_mes=?";
        $consulta = $this->db->query($sql, array($poa_com_id,$anio,$trimestre));
        $resultado = $consulta->result();
        return $resultado[0];
        
    }
    
    public function obtenerActividadTri($anio, $poa_com_id,$trimestre) {
        $sql = "SELECT COUNT(C.poa_act_det_id) valor
FROM poa_actividad A, poa_actividad_detalle B, $this->tabla C
WHERE A.poa_act_id=B.poa_act_id AND B.poa_act_det_id=C.poa_act_det_id
	AND A.poa_act_id=? AND B.poa_act_det_anio = ? AND C.poa_act_seg_tri_mes=?";
        $consulta = $this->db->query($sql, array($poa_com_id,$anio,$trimestre));
        $resultado = $consulta->result();
        return $resultado[0];
        
    }
    
}

?>
