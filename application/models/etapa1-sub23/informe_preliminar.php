<?php

/*
 * Contiene los metodos para acceder a la tabla INFORME_PRELIMINAR
 *
 * @author Ing. Karen Peñate
 */

class Informe_preliminar extends CI_Model {

    private $tabla = 'informe_preliminar';

     public function agregarInfPre($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function contarInfPrePorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }
    
    public function obtenerInfPre($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
     public function actualizarInfPre($inf_pre_id, $inf_pre_firmam, $inf_pre_firmau, $inf_pre_firmai,$inf_pre_fecha_borrador, $inf_pre_aceptacion, $inf_pre_fecha_observacion, $inf_pre_observacion, $inf_pre_ruta_archivo,$inf_pre_aceptado) {
        $datos = array(
            'inf_pre_firmam' => $inf_pre_firmam,
            'inf_pre_firmai' => $inf_pre_firmai,
            'inf_pre_firmau' => $inf_pre_firmau,
            'inf_pre_fecha_borrador' => $inf_pre_fecha_borrador,
            'inf_pre_aceptacion' => $inf_pre_aceptacion,
            'inf_pre_fecha_observacion' => $inf_pre_fecha_observacion,
            'inf_pre_observacion' => $inf_pre_observacion,
            'inf_pre_fecha_borrador' => $inf_pre_fecha_borrador,
            'inf_pre_ruta_archivo' => $inf_pre_ruta_archivo,
            'inf_pre_aceptada' => $inf_pre_aceptado
        );
        $this->db->where('inf_pre_id', $inf_pre_id);
        $this->db->update($this->tabla, $datos);
    }
}

?>
