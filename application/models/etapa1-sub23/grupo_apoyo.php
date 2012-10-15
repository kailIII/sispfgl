<?php

/*
 * Contiene los metodos para acceder a la tabla GRUPO_APOYO
 * que en pantalla es el equipo local de apoyo
 *
 * @author Ing. Karen Peñate
 */

class Grupo_apoyo extends CI_Model {

    private $tabla = 'grupo_apoyo';
    
    public function contarAcuMunPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarAcuMun($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdAcuMun($pro_pep_id) {
        $this->db->select('gru_apo_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarAcuMun($gru_apo_id, $acu_mun_fecha, $acu_mun_p1, $acu_mun_p2, $acu_mun_observacion, $acu_mun_ruta_archivo) {
        $datos = array(
            'acu_mun_fecha' => $acu_mun_fecha,
            'acu_mun_p1' => $acu_mun_p1,
            'acu_mun_p2' => $acu_mun_p2,
            'acu_mun_observacion' => $acu_mun_observacion,
            'acu_mun_ruta_archivo' => $acu_mun_ruta_archivo
        );
        $this->db->where('gru_apo_id', $gru_apo_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerAcuMun($gru_apo_id) {
        $this->db->where('gru_apo_id', $gru_apo_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
}

?>
