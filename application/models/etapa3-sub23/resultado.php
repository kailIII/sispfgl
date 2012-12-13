<?php

/*
 * Contiene los metodos para acceder a la tabla RESULTADO
 *
 * @author Ing. Karen Peñate
 */

class Resultado extends CI_Model {

    private $tabla = 'resultado';
    
    public function obtenerResultados() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
