<?php

/*
 * Contiene los metodos para acceder a la tabla plan_inversion
 *
 * @author Ing. Karen Peñate
 */
class Plan_inversion extends CI_Model {

    private $tabla = 'plan_inversion';
    
    public function agregarPlaIve($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function contarPlaIvePorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }
    
    public function obtenerPlaIve($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function editarPlanInversion($pla_inv_id, $pla_inv_observacion) {
        $datos = array(
            'pla_inv_observacion ' => $pla_inv_observacion
        );
        $this->db->where('pla_inv_id', $pla_inv_id);
        $this->db->update($this->tabla, $datos);
    }
    
}

?>
