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
}

?>
