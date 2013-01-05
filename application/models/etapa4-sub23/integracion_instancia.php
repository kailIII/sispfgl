<?php

/*
 * Contiene los metodos para acceder a la tabla INTEGRACION_INSTANCIA
 *
 * @author Ing. Karen Peñate
 */

class Integracion_instancia extends CI_Model {

    private $tabla = 'integracion_instancia';

    public function contarIntInsPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarIntIns($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdIntIns($pro_pep_id) {
        $this->db->select('int_ins_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarIntIns($int_ins_id, $int_ins_fecha, $int_ins_lugar, $int_ins_observacion, $int_ins_observacion, $int_ins_plan_trabajo, $int_ins_reglamento_int, $int_ins_ruta_archivo) {
        $datos = array(
            'int_ins_fecha' => $int_ins_fecha,
            'int_ins_lugar' => $int_ins_lugar,
            'int_ins_observacion' => $int_ins_observacion,
            'int_ins_observacion' => $int_ins_observacion,
            'int_ins_plan_trabajo' => $int_ins_plan_trabajo,
            'int_ins_reglamento_int' => $int_ins_reglamento_int,
            'int_ins_ruta_archivo' => $int_ins_ruta_archivo
        );
        $this->db->where('int_ins_id', $int_ins_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerIntIns($int_ins_id) {
        $this->db->where('int_ins_id', $int_ins_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
