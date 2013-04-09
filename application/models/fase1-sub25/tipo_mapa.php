<?php

/*
 * Contiene los metodos para acceder a la tabla tipo_mapa
 *
 * @author Ing. Karen Peñate
 */

class Tipo_mapa extends CI_Model {

    private $tabla = 'tipo_mapa';

    public function obtenerTiposMapas() {
        $this->db->order_by('tip_map_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
}

?>
