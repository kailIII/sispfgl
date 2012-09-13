<?php

/*
 * Contiene los metodos para acceder a la tabla CONSULTOR
 *
 * @author Ing. Karen Peñate
 */

class Consultor extends CI_Model {

    private $tabla = 'consultor';

    public function obtenerConsultores() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function insertarConsultor($con_nombre, $con_apellido, $con_telefono, $con_email, $pro_pep_id, $cons_id) {
        if ($cons_id == 0) {
            $datos = array(
                "con_nombre" => $con_nombre,
                "con_apellido" => $con_apellido,
                "con_telefono" => $con_telefono,
                "con_email" => $con_email,
                "pro_pep_id" => $pro_pep_id
            );
        } else {
            $datos = array(
                "con_nombre" => $con_nombre,
                "con_apellido" => $con_apellido,
                "con_telefono" => $con_telefono,
                "con_email" => $con_email,
                "pro_pep_id" => $pro_pep_id,
                "cons_id"=> $cons_id
            );
        }
        $this->db->insert($this->tabla, $datos);
    }

}

?>
