<?php

/*
 * Contiene los metodos para acceder a la tabla DIAGNOSTICO
 *
 * @author Ing. Karen Peñate
 */

class Diagnostico extends CI_Model {

    private $tabla = 'diagnostico';

     public function agregarDia($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function contarDiaPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }
    
    public function obtenerDia($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
     public function actualizarDia($dia_id, $dia_fecha_borrador, $dia_fecha_concejo_muni, $dia_fecha_observacion, $dia_observacion, $dia_ruta_archivo,$dia_vision) {
        $datos = array(
            'dia_fecha_borrador' => $dia_fecha_borrador,
            'dia_fecha_observacion' => $dia_fecha_observacion,
            'dia_fecha_concejo_muni' => $dia_fecha_concejo_muni,
            'dia_vision' => $dia_vision,
            'dia_observacion' => $dia_observacion,
            'dia_ruta_archivo' => $dia_ruta_archivo
        );
        $this->db->where('dia_id', $dia_id);
        $this->db->update($this->tabla, $datos);
    }
}

?>
