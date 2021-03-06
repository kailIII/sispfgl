<?php

/*
 * Contiene los metodos para acceder a la tabla ACUERDO_MUNICIPAL
 *
 * @author Ing. Karen Peñate
 */

class Acuerdo_municipal extends CI_Model {

    private $tabla = 'acuerdo_municipal';

    public function contarAcuMunPorPep($pro_pep_id,$eta_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->where('eta_id', $eta_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarAcuMun($pro_pep_id,$eta_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id,
            'eta_id'=>$eta_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdAcuMun($pro_pep_id,$eta_id) {
        $this->db->select('acu_mun_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->where('eta_id', $eta_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarAcuMun($acu_mun_id, $acu_mun_fecha, $acu_mun_p1, $acu_mun_p2, $acu_mun_observacion, $acu_mun_ruta_archivo) {
        $datos = array(
            'acu_mun_fecha' => $acu_mun_fecha,
            'acu_mun_p1' => $acu_mun_p1,
            'acu_mun_p2' => $acu_mun_p2,
            'acu_mun_observacion' => $acu_mun_observacion,
            'acu_mun_ruta_archivo' => $acu_mun_ruta_archivo
        );
        $this->db->where('acu_mun_id', $acu_mun_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function actualizarAcuMun2($acu_mun_id, $acu_mun_fecha_observacion,$acu_mun_fecha_borrador,$acu_mun_fecha_aceptacion, $acu_mun_p1, $acu_mun_observacion, $acu_mun_ruta_archivo) {
        $datos = array(
            'acu_mun_fecha_observacion' => $acu_mun_fecha_observacion,
            'acu_mun_fecha_borrador' => $acu_mun_fecha_borrador,
            'acu_mun_fecha_aceptacion' => $acu_mun_fecha_aceptacion,
            'acu_mun_p1' => $acu_mun_p1,
            'acu_mun_observacion' => $acu_mun_observacion,
            'acu_mun_ruta_archivo' => $acu_mun_ruta_archivo
        );
        $this->db->where('acu_mun_id', $acu_mun_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerAcuMun($acu_mun_id) {
        $this->db->where('acu_mun_id', $acu_mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function verificarAcuerdoMunicipal($mun_id,$etapa){
        $consulta = "SELECT CASE WHEN acu_mun_fecha IS NOT NULL AND acu_mun_p1 IS NOT NULL AND acu_mun_p2 IS NOT NULL 
                then 1 ELSE  0 END resultado
            FROM proyecto_pep A, $this->tabla B
            WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=? AND B.eta_id=?";
        $query = $this->db->query($consulta, array($mun_id,$etapa));
        return $query->result();   
    }
    
    public function verificarCriteriosAcuerdoMunicipal($mun_id,$etapa){
         $consulta = "Select count(A.acu_mun_id) valor 
            FROM $this->tabla A, criterio_acuerdo B, proyecto_pep C
            WHERE  A.acu_mun_id=B.acu_mun_id AND  A.pro_pep_id=C.pro_pep_id
                 AND B.cri_acu_valor IS NOT NULL AND C.mun_id=? AND A.eta_id=?";
        $query = $this->db->query($consulta, array($mun_id,$etapa));
        return $query->result();   
    }
    
    public function verificarAcuerdoMunicipal2($mun_id,$etapa){
        $consulta = "SELECT CASE WHEN B.acu_mun_p1 IS NOT NULL AND B.acu_mun_fecha_borrador IS NOT NULL AND B.acu_mun_fecha_observacion IS NOT NULL AND B.acu_mun_fecha_aceptacion IS NOT NULL
                then 1 ELSE  0 END resultado
            FROM proyecto_pep A, $this->tabla B
            WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=? AND B.eta_id=?";
        $query = $this->db->query($consulta, array($mun_id,$etapa));
        return $query->result();   
    }
}

?>
