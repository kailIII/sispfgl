<?php

/*
 * Contiene los metodos para acceder a la tabla consultores_interes
 *
 * @author Ing. Karen Peñate
 */

class Consultores_interes extends CI_Model {

    private $tabla = 'consultores_interes';

    public function obtenerConsultoresInteres($pro_id) {
        $this->db->where('pro_id', $pro_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerConsultoresAplican($pro_id) {
        $this->db->where('pro_id', $pro_id);
        $this->db->where('con_int_aplica','Si');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerConsultoresSeleccionada($pro_id) {
        $this->db->where('pro_id', $pro_id);
        $this->db->where('con_int_con_int_seleccionada','Si');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function agregarConsultoresInteres($con_int_nombre, $con_int_tipo, $pro_id) {
        $datos = array(
            'con_int_nombre ' => $con_int_nombre,
            'con_int_tipo ' => $con_int_tipo,
            'pro_id ' => $pro_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarConsultoresInteres($con_int_id, $con_int_nombre, $con_int_tipo) {
        $datos = array(
            'con_int_nombre' => $con_int_nombre,
            'con_int_tipo' => $con_int_tipo
        );
        $this->db->where('con_int_id', $con_int_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function editarConsultoresInteresAplica($con_int_id, $con_int_aplica) {
        $datos = array(
            'con_int_aplica' => $con_int_aplica
        );
        $this->db->where('con_int_id', $con_int_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function editarConsultoresInteresSeleccionado($con_int_id, $con_int_seleccionada) {
        $datos = array(
            'con_int_seleccionada' => $con_int_seleccionada
        );
        $this->db->where('con_int_id', $con_int_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarConsultoresInteres($con_int_id) {
        $this->db->where('con_int_id', $con_int_id);
        $this->db->delete($this->tabla);
    }

}

?>
