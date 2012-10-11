<?php

/*
 * Contiene los metodos para acceder a la tabla ACUERDO_MUNICIPAL
 *
 * @author Ing. Karen Peñate
 */

class Acuerdo_municipal extends CI_Model {

    private $tabla = 'acuerdo_municipal';

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
        $this->db->select('acu_mun_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
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
        $this->db->where('acu_mun_id',$acu_mun_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerAcuMun($acu_mun_id) {
        $this->db->where('acu_mun_id', $acu_mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
}

?>
