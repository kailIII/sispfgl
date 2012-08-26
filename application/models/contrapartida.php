<?php

/*
 * Contiene los metodos para acceder a la tabla CONTRAPARTIDA
 *
 * @author Ing. Karen Peñate
 */

class Contrapartida extends CI_Model {

    public function obtenerContrapartidas() {
        $consulta = $this->db->get('contrapartida');
        return $consulta->result();
    }

}

?>
