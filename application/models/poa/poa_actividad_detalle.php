<?php

/*
 * Contiene los metodos para acceder a la tabla poa_actividad_detalle
 *
 * @author Ing. Karen Peñate
 */

class Poa_actividad_detalle extends CI_Model {

    private $tabla = 'poa_actividad_detalle';

    public function obtenerActividadDetalle($anio, $poa_com_id) {
        $sql = "SELECT COUNT(poa_act_det_id) valor
FROM poa_componente A,poa_actividad B, $this->tabla C
WHERE A.poa_com_id=B.poa_com_id AND B.poa_act_id=C.poa_act_id 
	AND A.poa_com_id=? AND C.poa_act_det_anio = ?";
        $consulta = $this->db->query($sql, array($poa_com_id,$anio));
        $resultado = $consulta->result();
        return $resultado[0];
        
    }
    
    public function obtenerPorActividadDetalle($anio, $poa_act_id) {
        $sql = "SELECT COUNT(poa_act_det_id) valor
FROM poa_actividad B, $this->tabla C
WHERE B.poa_act_id=C.poa_act_id 
	AND B.poa_act_id=? AND C.poa_act_det_anio = ?";
        $consulta = $this->db->query($sql, array($poa_act_id,$anio));
        $resultado = $consulta->result();
        return $resultado[0];
        
    }
    
    public function obtenerPorActividadDetalleCod($anio, $codigo) {
        $sql = "SELECT *
FROM poa_actividad B, $this->tabla C
WHERE B.poa_act_id=C.poa_act_id 
	AND B.poa_act_codigo=? AND C.poa_act_det_anio = ?";
        $consulta = $this->db->query($sql, array($codigo,$anio));
        $resultado = $consulta->result();
        return $resultado;
        
    }

}

?>
