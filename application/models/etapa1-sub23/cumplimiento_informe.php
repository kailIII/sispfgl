<?php

/*
 * Contiene los metodos para acceder a la tabla CUMPLIMIENTO_INFORME
 *
 * @author Ing. Karen Peñate
 */

class Cumplimiento_informe extends CI_Model {

    private $tabla = 'cumplimiento_informe';

    public function insertarCumplimientoInform($inf_pre_id, $cum_min_id) {
        $datos = array(
            'inf_pre_id' => $inf_pre_id,
            'cum_min_id' => $cum_min_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarCumplimientoInform($cum_inf_valor, $inf_pre_id, $cum_min_id) {
        $datos = array(
            'cum_inf_valor' => $cum_inf_valor
        );
        $this->db->where('inf_pre_id', $inf_pre_id);
        $this->db->where('cum_min_id', $cum_min_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerCumplimientoInform($inf_pre_id) {
        $this->db->where('inf_pre_id', $inf_pre_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosCumplimientosInforme($inf_pre_id) {
        $this->db->select('cumplimiento_minimo.cum_min_id cum_min_id, 
                           cumplimiento_minimo.cum_min_nombre cum_min_nombre,
                           cumplimiento_informe.cum_inf_valor cum_inf_valor'
        );
        $this->db->from($this->tabla);
        $this->db->join('cumplimiento_minimo', 'cumplimiento_minimo.cum_min_id = cumplimiento_informe.cum_min_id');
        $this->db->where('cumplimiento_informe.inf_pre_id', $inf_pre_id);
        $this->db->order_by('cum_min_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
