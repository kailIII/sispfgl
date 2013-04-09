<?php

/*
 * Contiene los metodos para acceder a la tabla APORTE_MUNICIPAL
 *
 * @author Ing. Karen Peñate
 */

class Aporte_municipal extends CI_Model {

    private $tabla = 'aporte_municipal';

    public function contarAportePorMunEta($mun_id, $eta_id) {
        $this->db->from($this->tabla);
        $this->db->where('mun_id', $mun_id);
        $this->db->where('eta_id', $eta_id);
        $consulta =$this->db->count_all_results();
        return $consulta;
    }
    
    public function obtenerAporteMuncipal($mun_id, $eta_id) {
        $this->db->where('mun_id', $mun_id);
        $this->db->where('eta_id', $eta_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarAporteMunicipal($mun_id, $eta_id) {
        $datos = array(
            'mun_id' => $mun_id,
            'eta_id' => $eta_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarAcuMun($apo_mun_id, $apo_mun_monto_estimado, $apo_mun_faprobacion, $apo_mun_observaciones) {
        $datos = array(
            'apo_mun_monto_estimado' => $apo_mun_monto_estimado,
            'apo_mun_faprobacion' => $apo_mun_faprobacion,
            'apo_mun_observaciones' => $apo_mun_observaciones
        );
        $this->db->where('apo_mun_id', $apo_mun_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
