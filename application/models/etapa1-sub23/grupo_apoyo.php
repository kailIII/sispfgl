<?php

/*
 * Contiene los metodos para acceder a la tabla GRUPO_APOYO
 * que en pantalla es el equipo local de apoyo
 *
 * @author Ing. Karen Peñate
 */

class Grupo_apoyo extends CI_Model {

    private $tabla = 'grupo_apoyo';
    
    public function contarGruApoPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarGruApo($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdGruApo($pro_pep_id) {
        $this->db->select('gru_apo_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarGruApo($gru_apo_id, $gru_apo_fecha, $gru_apo_c3, $gru_apo_c4, $gru_apo_observacion, $gru_apo_lugar) {
        $datos = array(
            'gru_apo_fecha' => $gru_apo_fecha,
            'gru_apo_c3' => $gru_apo_c3,
            'gru_apo_c4' => $gru_apo_c4,
            'gru_apo_observacion' => $gru_apo_observacion,
            'gru_apo_lugar' => $gru_apo_lugar
        );
        $this->db->where('gru_apo_id', $gru_apo_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerGruApo($gru_apo_id) {
        $this->db->where('gru_apo_id', $gru_apo_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
   public function verificarGrupoApoyo($mun_id){
        $consulta = "Select CASE WHEN gru_apo_fecha IS NOT NULL AND gru_apo_c3 IS NOT NULL AND gru_apo_c4 IS NOT NULL AND gru_apo_lugar IS NOT NULL then 1 ELSE  0 END resultado
           FROM proyecto_pep A, $this->tabla B
           WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    
    public function verificarParticipantesGrupoApoyo($mun_id){
         $consulta = "SELECT count(A.gru_apo_id) valor 
            FROM $this->tabla A, participante B,proyecto_pep C
            WHERE  A.gru_apo_id=B.gru_apo_id AND  A.pro_pep_id=C.pro_pep_id
                 AND C.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
}

?>
