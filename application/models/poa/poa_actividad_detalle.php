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
        $consulta = $this->db->query($sql, array($poa_com_id, $anio));
        $resultado = $consulta->result();
        return $resultado[0];
    }

    public function obtenerPorActividadDetalle($anio, $poa_act_id) {
        $sql = "SELECT COUNT(poa_act_det_id) valor
FROM poa_actividad B, $this->tabla C
WHERE B.poa_act_id=C.poa_act_id 
	AND B.poa_act_id=? AND C.poa_act_det_anio = ?";
        $consulta = $this->db->query($sql, array($poa_act_id, $anio));
        $resultado = $consulta->result();
        return $resultado[0];
    }

    public function obtenerPorActividadDetalleCod($anio, $codigo) {
        $sql = "SELECT *
FROM poa_actividad B, $this->tabla C
WHERE B.poa_act_id=C.poa_act_id 
	AND B.poa_act_codigo LIKE ('$codigo'||'_') AND C.poa_act_det_anio = ?";
        $consulta = $this->db->query($sql, array( $anio));
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtenerCodigoPresupuestario($anio, $codigo) {
        $sql = "SELECT DISTINCT( A.poa_act_cod_presupuestario )
FROM poa_actividad A
	INNER JOIN $this->tabla B ON A.poa_act_id=B.poa_act_id
	INNER JOIN poa_componente C ON A.poa_com_id=C.poa_com_id
WHERE A.poa_act_cod_presupuestario IS NOT NULL AND A.poa_act_cod_presupuestario <> '' 
	AND B.poa_act_det_anio=$anio AND C.poa_com_codigo LIKE '$codigo%'";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado;
    }
    
    public function obtenerBirfCodigoPresupuestario($codigo,$anio,$componente){
        $sql="SELECT SUM(B.poa_act_det_birf) poa_act_det_birf
FROM poa_actividad A
	INNER JOIN $this->tabla B ON A.poa_act_id=B.poa_act_id
	INNER JOIN poa_componente C ON A.poa_com_id=C.poa_com_id
WHERE A.poa_act_cod_presupuestario = '$codigo'
	AND B.poa_act_det_anio=$anio AND C.poa_com_codigo LIKE '$componente%'";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado[0]->poa_act_det_birf;
    }
    
    public function obtenerContrapartidaCodigoPresupuestario($codigo,$anio,$componente){
        $sql="SELECT SUM(B.poa_act_det_contrapartida) poa_act_det_contrapartida
FROM poa_actividad A
	INNER JOIN $this->tabla B ON A.poa_act_id=B.poa_act_id
	INNER JOIN poa_componente C ON A.poa_com_id=C.poa_com_id
WHERE A.poa_act_cod_presupuestario = '$codigo'
	AND B.poa_act_det_anio=$anio AND C.poa_com_codigo LIKE '$componente%'";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado[0]->poa_act_det_contrapartida;
    }

}

?>
