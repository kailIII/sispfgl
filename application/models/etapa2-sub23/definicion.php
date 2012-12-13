<?php

/*
 * Contiene los metodos para acceder a la tabla DEFINICION
 * que en pantalla es el equipo gestor
 *
 * @author Ing. Karen Peñate
 */

class Definicion extends CI_Model {

    private $tabla = 'definicion';

    public function contarDefPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarDef($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdDef($pro_pep_id) {
        $this->db->select('def_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarDef($def_id, $def_fecha, $def_ruta_archivo) {
        $datos = array(
            'def_fecha' => $def_fecha,
            'def_ruta_archivo' => $def_ruta_archivo
        );
        $this->db->where('def_id', $def_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerDef($def_id) {
        $this->db->where('def_id', $def_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
