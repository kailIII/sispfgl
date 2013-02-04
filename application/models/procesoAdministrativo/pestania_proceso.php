<?php

/*
 * Contiene los metodos para acceder a la tabla pestania_proceso
 *
 * @author Ing. Karen Peñate
 */

class Pestania_proceso extends CI_Model {

    private $tabla = 'pestania_proceso';
    
    public function obtenerPestaniaProcesos() {
        $this->db->order_by('pes_pro_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
