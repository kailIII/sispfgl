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

    public function insertarReunion() {
/*        $data = array(
            'titulo' => $titulo,
            'nombre' => $nombre,
            'fecha' => $fecha
        );*/
        $data =array();
        $this->db->insert('reunion', $data);
    }

}

?>
