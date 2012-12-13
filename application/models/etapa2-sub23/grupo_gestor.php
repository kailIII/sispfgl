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

}

?>
