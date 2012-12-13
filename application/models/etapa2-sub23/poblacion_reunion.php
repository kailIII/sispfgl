<?php

/*
 * Contiene los metodos para acceder a la tabla POBLACION_REUNION
 *
 * @author Ing. Karen Peñate
 */

class Poblacion_reunion extends CI_Model {

    private $tabla = 'poblacion_reunion';

    public function insertarPoblacionReunion($reu_id) {
        $datos = array(
            'reu_id' => $reu_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarPoblacionReunion($pob_comunidad,$pob_sector,$pob_institucion, $pob_id) {
        $datos = array(
            'pob_comunidad' => $pob_comunidad,
            'pob_sector' => $pob_sector,
            'pob_institucion' => $pob_institucion
        );
        $this->db->where('pob_id', $pob_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerPoblacionReunionPorReunion($reu_id) {
        $this->db->where('reu_id', $reu_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function obtenerPoblacionReunion($pob_id) {
             $this->db->where('pob_id', $pob_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
}

?>
