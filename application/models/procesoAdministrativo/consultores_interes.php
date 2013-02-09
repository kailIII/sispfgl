<?php

/*
 * Contiene los metodos para acceder a la tabla consultores_interes
 *
 * @author Ing. Karen Peñate
 */

class Consultores_interes extends CI_Model {

    private $tabla = 'consultores_interes';

    public function obtenerConsultoresInteres($pro_id) {
        $this->db->select('consultora.cons_nombre con_int_nombre, 
                consultores_interes.pro_id, 
                consultores_interes.con_int_seleccionada, 
                consultores_interes.con_int_aplica, 
                consultores_interes.con_int_tipo, 
                consultores_interes.con_int_id, 
                consultores_interes.cons_id'
        );
        $this->db->from($this->tabla);
        $this->db->join('consultora', 'consultora.cons_id = consultores_interes.cons_id');
        $this->db->where('consultores_interes.pro_id', $pro_id);
        $this->db->order_by('pro_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerIDConsultoresInteres($pro_id) {
        $this->db->select('consultora.cons_id');
        $this->db->from($this->tabla);
        $this->db->join('consultora', 'consultora.cons_id = consultores_interes.cons_id');
        $this->db->where('consultores_interes.pro_id', $pro_id);
        $this->db->order_by('pro_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerConsultoresAplican($pro_id) {
        $this->db->select('consultora.cons_nombre con_int_nombre, 
                consultores_interes.pro_id, 
                consultores_interes.con_int_seleccionada, 
                consultores_interes.con_int_aplica, 
                consultores_interes.con_int_tipo, 
                consultores_interes.con_int_id, 
                consultores_interes.cons_id'
        );
        $this->db->from($this->tabla);
        $this->db->join('consultora', 'consultora.cons_id = consultores_interes.cons_id');
        $this->db->where('consultores_interes.pro_id', $pro_id);
        $this->db->where('consultores_interes.con_int_aplica', 'Si');
        $this->db->order_by('pro_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerConsultoresSeleccionada($pro_id) {
        $this->db->select('consultora.cons_nombre con_int_nombre, 
                consultores_interes.pro_id, 
                consultores_interes.con_int_seleccionada, 
                consultores_interes.con_int_aplica, 
                consultores_interes.con_int_tipo, 
                consultores_interes.con_int_id, 
                consultores_interes.cons_id'
        );
        $this->db->from($this->tabla);
        $this->db->join('consultora', 'consultora.cons_id = consultores_interes.cons_id');
        $this->db->where('consultores_interes.pro_id', $pro_id);
        $this->db->where('consultores_interes.con_int_seleccionada', 'Si');
        $this->db->order_by('pro_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerConsultoresSeleccionada($pro_id) {
        $this->db->from($this->tabla);
        $this->db->join('consultora', 'consultora.cons_id = consultores_interes.cons_id');
        $this->db->where('consultores_interes.pro_id', $pro_id);
        $this->db->where('consultores_interes.con_int_seleccionada', 'Si');
        $this->db->order_by('pro_id');
        return $this->db->count_all_results();
    }

    public function agregarConsultoresInteres($con_int_nombre, $con_int_tipo, $pro_id) {
        $datos = array(
            'cons_id ' => $con_int_nombre,
            'con_int_tipo ' => $con_int_tipo,
            'pro_id ' => $pro_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarConsultoresInteres($con_int_id, $con_int_nombre, $con_int_tipo) {
        $datos = array(
            'cons_id' => $con_int_nombre,
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

    public function editarConsultoresInteresSeleccionado($con_int_id, $con_int_seleccionada, $pro_id) {
        if (strcmp($con_int_seleccionada, 'Si') == 0) {
            
        }

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
