<?php

/*
 * Contiene los metodos para acceder a la tabla ROL que maneja
 * los roles del sistema asignado a los usuarios
 *
 * @author Ing. Karen Peñate
 */

class rol extends CI_Model {

    private $tabla = 'rol';

    public function obtenerRoles() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
