<?php

/*
 * Contiene los metodos para acceder a la tabla FACILITADOR
 *
 * @author Ing. Karen Peñate
 */

class Facilitador extends CI_Model {

    private $tabla = 'facilitador';

    public function obtenerFacilitadores($campo, $campo_id) {
        $this->db->where($campo, $campo_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarFacilitador($fac_nombre, $fac_apellido, $fac_email, $campo, $campo_id, $fac_telefono) {
        $datos = array(
            'fac_nombre' => $fac_nombre,
            'fac_apellido' => $fac_apellido,
            'fac_email' => $fac_email,
            'fac_telefono' => $fac_telefono,
            $campo => $campo_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function modificarFacilitador($fac_id, $fac_nombre, $fac_apellido, $fac_email, $fac_telefono) {
        $datos = array(
            'fac_nombre' => $fac_nombre,
            'fac_apellido' => $fac_apellido,
            'fac_email' => $fac_email,
            'fac_telefono' => $fac_telefono,
        );
        $this->db->where('fac_id', $fac_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarFacilitador($fac_id) {
        $this->db->where('fac_id', $fac_id);
        $this->db->delete($this->tabla);
    }

}

?>
