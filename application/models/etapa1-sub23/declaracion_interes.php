<?php

/*
 * Contiene los metodos para acceder a la DECLARACION_INTERES
 *
 * @author Ing. Karen Peñate
 */

class Declaracion_interes extends CI_Model {

    private $tabla = 'declaracion_interes';

    public function contarDecIntPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarDecInt($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdDecInt($pro_pep_id) {
        $this->db->select('dec_int_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarDecInt($dec_int_id, $dec_int_fecha, $dec_int_lugar, $dec_int_comentario, $dec_int_ruta_archivo) {
        $datos = array(
            'dec_int_fecha' => $dec_int_fecha,
            'dec_int_lugar' => $dec_int_lugar,
            'dec_int_comentario' => $dec_int_comentario,
            'dec_int_ruta_archivo' => $dec_int_ruta_archivo
        );
        $this->db->where('dec_int_id', $dec_int_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerDecInt($dec_int_id) {
        $this->db->where('dec_int_id', $dec_int_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
