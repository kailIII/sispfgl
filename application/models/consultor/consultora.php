<?php

/*
 * Contiene los metodos para acceder a la tabla CONSULTORA
 *
 * @author Ing. Karen Peñate
 */

class Consultora extends CI_Model {

    private $tabla = 'consultora';

    public function obtenerConsultora() {
        $this->db->order_by('cons_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerConsultoraPorId($cons_id) {
        $this->db->where('cons_id',$cons_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    public function ultimoCodigo() {
        $this->db->select_max('cons_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function insertarConsultora($cons_nombre, $cons_direccion, $cons_telefono, $cons_telefono2, $cons_fax, $cons_email, $cons_repres_legal, $cons_observaciones) {
        $datos = array(
            "cons_nombre" => $cons_nombre,
            "cons_direccion" => $cons_direccion,
            "cons_telefono" => $cons_telefono,
            "cons_telefono2" => $cons_telefono2,
            "cons_fax" => $cons_fax,
            "cons_email" => $cons_email,
            "cons_repres_legal" => $cons_repres_legal,
            "cons_observaciones" => $cons_observaciones
        );
        $this->db->insert($this->tabla, $datos);
        
        
    }

    public function editarConsultora($cons_id, $cons_nombre, $cons_direccion, $cons_telefono, $cons_telefono2, $cons_fax, $cons_email, $cons_repres_legal, $cons_observaciones) {
        $datos = array(
            "cons_nombre" => $cons_nombre,
            "cons_direccion" => $cons_direccion,
            "cons_telefono" => $cons_telefono,
            "cons_telefono2" => $cons_telefono2,
            "cons_fax" => $cons_fax,
            "cons_email" => $cons_email,
            "cons_repres_legal" => $cons_repres_legal,
            "cons_observaciones" => $cons_observaciones
        );
        $this->db->where('cons_id', $cons_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
