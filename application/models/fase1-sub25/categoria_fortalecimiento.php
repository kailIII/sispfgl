<?php

/*
 * Contiene los metodos para acceder a la tabla categoria_fortalecimiento
 *
 * @author Ing. Karen Peñate
 */

class Categoria_fortalecimiento extends CI_Model {

    private $tabla = 'categoria_fortalecimiento';

    public function obtenerCategoriasFortalecimiento() {
        $this->db->order_by('cat_for_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
}

?>
