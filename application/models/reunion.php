<?php

/*
 * Contiene los metodos para acceder a la tabla REUNION
 *
 * @author Ing. Karen Peñate
 */

class Reunion extends CI_Model {

    public function obtenerReuniones() {
        $consulta = $this->db->get('reunion');
        return $consulta->result();
    }

}

?>
