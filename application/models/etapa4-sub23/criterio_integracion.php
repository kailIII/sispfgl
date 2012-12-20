<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO_INTEGRACION
 *
 * @author Ing. Karen Peñate
 */

class Criterio_integracion extends CI_Model {

    private $tabla = 'criterio_integracion';

    public function insertarCriterioIntIns($int_ins_id, $cri_id) {
        $datos = array(
            'int_ins_id' => $int_ins_id,
            'cri_id' => $cri_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarCriterioIntIns($cri_int_valor, $int_ins_id, $cri_id) {
        $datos = array(
            'cri_int_valor' => $cri_int_valor
        );
        $this->db->where('int_ins_id', $int_ins_id);
        $this->db->where('cri_id', $cri_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerCriterioIntIns($int_ins_id) {
        $this->db->where('int_ins_id', $int_ins_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerLosCriteriosIntIns($int_ins_id) {
        $this->db->select('criterio.cri_id cri_id, 
                           criterio.cri_nombre cri_nombre,
                           criterio_integracion.cri_int_valor cri_int_valor'
        );
        $this->db->from($this->tabla);
        $this->db->join('criterio', 'criterio.cri_id = criterio_integracion.cri_id');
        $this->db->where('criterio_integracion.int_ins_id', $int_ins_id);
        $this->db->order_by('cri_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
