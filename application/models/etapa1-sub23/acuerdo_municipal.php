<?php
/*
 * Contiene los metodos para acceder a la tabla ACUERDO_MUNICIPAL
 *
 * @author Ing. Karen Peñate
 */

class Acuerdo_municipal  extends CI_Model {

    private $tabla = 'acuerdo_municipal';
    
    public function contarAcuMunPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }
    
    public function agregarAcuMun($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function obtenerIdAcuMun($pro_pep_id) {
        $this->db->select('acu_mun_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

}

?>
