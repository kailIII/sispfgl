<?php

/*
 * Contiene los metodos para acceder a la tabla REUNION
 *
 * @author Ing. Karen Peñate
 */

class Reunion extends CI_Model {

    private $tabla = 'reunion';
    public function obtenerReuniones() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function insertarReunion() {
/*        $data = array(
            'titulo' => $titulo,
            'nombre' => $nombre,
            'fecha' => $fecha
        );*/
        $data =array();
        $this->db->insert($this->tabla, $data);
    }

}

?>
