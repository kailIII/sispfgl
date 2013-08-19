<?php

/*
 * Contiene los metodos para acceder a la tabla INTEGRACION_INSTANCIA
 *
 * @author Ing. Karen Peñate
 */

class Integracion_instancia extends CI_Model {

    private $tabla = 'integracion_instancia';

    public function contarIntInsPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarIntIns($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdIntIns($pro_pep_id) {
        $this->db->select('int_ins_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarIntIns($int_ins_id, $int_ins_fecha, $int_ins_lugar, $int_ins_observacion, $int_ins_observacion, $int_ins_plan_trabajo, $int_ins_reglamento_int, $int_ins_ruta_archivo) {
        $datos = array(
            'int_ins_fecha' => $int_ins_fecha,
            'int_ins_lugar' => $int_ins_lugar,
            'int_ins_observacion' => $int_ins_observacion,
            'int_ins_observacion' => $int_ins_observacion,
            'int_ins_plan_trabajo' => $int_ins_plan_trabajo,
            'int_ins_reglamento_int' => $int_ins_reglamento_int,
            'int_ins_ruta_archivo' => $int_ins_ruta_archivo
        );
        $this->db->where('int_ins_id', $int_ins_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerIntIns($int_ins_id) {
        $this->db->where('int_ins_id', $int_ins_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function verificarIntegracionInstancia($mun_id){
        $consulta = "SELECT CASE WHEN B.int_ins_fecha IS NOT NULL AND B.int_ins_plan_trabajo IS NOT NULL AND B.int_ins_reglamento_int IS NOT NULL
                then 1 ELSE  0 END resultado
            FROM proyecto_pep A, $this->tabla B
            WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    
        public function verificarParticipantesIntegracionInstancia($mun_id){
         $consulta = "SELECT count(A.int_ins_id) valor 
            FROM $this->tabla A, participante B,proyecto_pep C
            WHERE  A.int_ins_id=B.int_ins_id AND  A.pro_pep_id=C.pro_pep_id
                 AND C.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    
    public function verificarCriteriosIntegracionInstancia($mun_id){
         $consulta = "Select count(A.int_ins_id) valor 
            FROM $this->tabla A, criterio_integracion B, proyecto_pep C
            WHERE  A.int_ins_id=B.int_ins_id AND  A.pro_pep_id=C.pro_pep_id
                 AND B.cri_int_valor IS NOT NULL AND C.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    

}

?>
