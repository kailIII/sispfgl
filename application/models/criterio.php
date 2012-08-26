<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO
 *
 * @author Ing. Karen Peñate
 */

class Criterio extends CI_Model {

    public function obtenerCriterios() {
        $consulta = $this->db->get('criterio');
        return $consulta->result();
    }

}

?>
