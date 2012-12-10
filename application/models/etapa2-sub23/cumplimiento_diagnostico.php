<?php

/*
 * Contiene los metodos para acceder a la tabla CUMPLIMIENTO_DIAGNOSTICO
 *
 * @author Ing. Karen Peñate
 */

class Cumplimiento_diagnostico extends CI_Model {

    private $tabla = 'cumplimiento_diagnostico';

    public function insertarCumplimientoDiag($dia_id, $cum_min_id) {
        $datos = array(
            'dia_id' => $dia_id,
            'cum_min_id' => $cum_min_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarCumplimientoDiag($cum_dia_valor, $dia_id, $cum_min_id) {
        $datos = array(
            'cum_dia_valor' => $cum_dia_valor
        );
        $this->db->where('dia_id', $dia_id);
        $this->db->where('cum_min_id', $cum_min_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerCumplimientoDiag($dia_id) {
        $this->db->where('dia_id', $dia_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    function obtenerLosCumplimientosDiagnostico($dia_id) {
        $this->db->select('cumplimiento_minimo.cum_min_id cum_min_id, 
                           cumplimiento_minimo.cum_min_nombre cum_min_nombre,
                           cumplimiento_diagnostico.cum_dia_valor cum_dia_valor'
        );
        $this->db->from($this->tabla);
        $this->db->join('cumplimiento_minimo', 'cumplimiento_minimo.cum_min_id = cumplimiento_diagnostico.cum_min_id');
        $this->db->where('cumplimiento_diagnostico.dia_id', $dia_id);
        $this->db->order_by('cum_min_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
