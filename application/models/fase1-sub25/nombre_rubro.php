<?php

/*
 * Contiene los metodos para acceder a la tabla nombre_rubro
 *
 * @author Ing. Karen Peñate
 */

class Nombre_rubro extends CI_Model {

    private $tabla = 'nombre_rubro';

    public function obtenerNombresRubro() {
        $this->db->order_by('nom_rub_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
}

?>
