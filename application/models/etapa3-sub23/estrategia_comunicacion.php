<?php

/*
 * Contiene los metodos para acceder a la tabla estrategia_comunicacion
 *
 * @author Ing. Karen Peñate
 */
class Estrategia_comunicacion extends CI_Model {

    private $tabla = 'estrategia_comunicacion';
    
    public function agregarEstCom($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function contarEstComPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }
    
    public function obtenerEstCom($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function editarEstCom($est_com_id, $est_com_observacion) {
        $datos = array(
            'est_com_observacion ' => $est_com_observacion
        );
        $this->db->where('est_com_id', $est_com_id);
        $this->db->update($this->tabla, $datos);
    }
    
}

?>
