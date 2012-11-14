<?php

/*
 * Contiene los metodos para acceder a la tabla INVENTARIO_INFORMACION
 *
 * @author Ing. Karen Peñate
 */
class inventario_informacion extends CI_Model {

    private $tabla = 'inventario_informacion';
    
    public function agregarInvInf($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function contarInvInfPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }
    
    public function obtenerInvInf($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function editarInventarioInformacion($inv_inf_id, $inv_inf_observacion) {
        $datos = array(
            'inv_inf_observacion ' => $inv_inf_observacion
        );
        $this->db->where('inv_inf_id', $inv_inf_id);
        $this->db->update($this->tabla, $datos);
    }
    
}

?>
