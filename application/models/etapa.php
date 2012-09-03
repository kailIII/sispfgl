<?php

/*
 * Contiene los metodos para acceder a la tabla ETAPA
 *
 * @author Ing. Karen Peñate
 */

class Etapa extends CI_Model {

    private $tabla = 'etapa';
    
    public function obtenerEtapas() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    //Obtiene la Etapa según el Id enviado
    public function obtenerEtapaId($id) {
        $this->db->select('eta_nombre');
        $this->db->where('eta_id', $id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
