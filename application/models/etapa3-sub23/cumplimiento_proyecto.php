<?php

/*
 * Contiene los metodos para acceder a la tabla CUMPLIMIENTO_PROYECTO
 *
 * @author Ing. Karen Peñate
 */

class Cumplimiento_proyecto extends CI_Model {

    private $tabla = 'cumplimiento_proyecto';

    public function insertarCumplimientoProy($pro_pep_id, $cum_min_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id,
            'cum_min_id' => $cum_min_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarCumplimientoProy($cum_pep_valor, $pro_pep_id, $cum_min_id) {
        $datos = array(
            'cum_pro_valor' => $cum_pep_valor
        );
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->where('cum_min_id', $cum_min_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerCumplimientoProy($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosCumplimientosPro($pro_pep_id) {
        $this->db->select('cumplimiento_minimo.cum_min_id cum_min_id, 
                           cumplimiento_minimo.cum_min_nombre cum_min_nombre,
                           cumplimiento_proyecto.cum_pro_valor cum_pro_valor'
        );
        $this->db->from($this->tabla);
        $this->db->join('cumplimiento_minimo', 'cumplimiento_minimo.cum_min_id = cumplimiento_proyecto.cum_min_id');
        $this->db->where('cumplimiento_proyecto.pro_pep_id', $pro_pep_id);
        $this->db->order_by('cum_min_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function contarCumplimientosPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

}

?>
