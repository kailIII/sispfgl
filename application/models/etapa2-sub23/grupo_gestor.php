<?php

/*
 * Contiene los metodos para acceder a la tabla GRUPO_GESTOR
 * que en pantalla es el equipo gestor
 *
 * @author Ing. Karen Peñate
 */

class Grupo_gestor extends CI_Model {

    private $tabla = 'grupo_gestor';

    public function contarGruGesPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarGruGes($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdGruGes($pro_pep_id) {
        $this->db->select('gru_ges_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarGruGes($gru_ges_id, $gru_ges_lugar, $gru_ges_fecha, $gru_ges_acuerdo, $gru_ges_observacion) {
        $datos = array(
            'gru_ges_lugar' => $gru_ges_lugar,
            'gru_ges_fecha' => $gru_ges_fecha,
            'gru_ges_acuerdo' => $gru_ges_acuerdo,
            'gru_ges_observacion' => $gru_ges_observacion
        );
        $this->db->where('gru_ges_id', $gru_ges_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerGruGes($gru_ges_id) {
        $this->db->where('gru_ges_id', $gru_ges_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
       public function verificarGrupoGestor($mun_id){
        $consulta = "SELECT CASE WHEN B.gru_ges_fecha IS NOT NULL AND B.gru_ges_acuerdo IS NOT NULL AND B.gru_ges_acuerdo IS NOT NULL THEN 1 ELSE  0 END resultado
                     FROM proyecto_pep A, $this->tabla B
                     WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    
    public function verificarParticipantesGrupoGestor($mun_id){
         $consulta = "SELECT count(A.gru_ges_id) valor 
            FROM $this->tabla A, participante B,proyecto_pep C
            WHERE  A.gru_ges_id=B.gru_ges_id AND  A.pro_pep_id=C.pro_pep_id
                 AND C.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    
    public function verificarCriteriosGrupoGestor($mun_id){
         $consulta = "Select count(A.gru_ges_id) valor 
            FROM $this->tabla A, criterio_grupo_gestor B, proyecto_pep C
            WHERE  A.gru_ges_id=B.gru_ges_id AND  A.pro_pep_id=C.pro_pep_id
                 AND B.cri_gru_ges_valor IS NOT NULL AND C.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    
    public function verificarCapacipacionGrupoGestor($mun_id){
        $consulta="SELECT count(D.cap_id) valor 
                   FROM $this->tabla A, participante B,proyecto_pep C, participante_capacitacion D
                   WHERE  A.gru_ges_id=B.gru_ges_id AND  A.pro_pep_id=C.pro_pep_id AND D.par_id=B.par_id
                         AND C.mun_id=?";
         $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
}

?>
