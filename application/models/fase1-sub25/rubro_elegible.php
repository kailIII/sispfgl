<?php

/*
 * Contiene los metodos para acceder a la tabla rubro_elegible
 *
 * @author Ing. Karen Peñate
 */

class Rubro_elegible extends CI_Model {

    private $tabla = 'rubro_elegible';

    public function insertarRubroElegible($rub_id, $nom_rub_id) {
        $datos = array(
            'rub_id' => $rub_id,
            'nom_rub_id' => $nom_rub_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarRubroElegible($rub_ele_seleccionado, $rub_id, $nom_rub_id,$rub_ele_observacion) {
        $datos = array(
            'rub_ele_seleccionado' => $rub_ele_seleccionado,
            'rub_ele_observacion'=> $rub_ele_observacion
        );
        $this->db->where('rub_id', $rub_id);
        $this->db->where('nom_rub_id', $nom_rub_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function actualizarRubroElegible2($rub_ele_monto, $rub_id, $nom_rub_id) {
        $datos = array(
            'rub_ele_monto' => $rub_ele_monto
        );
        $this->db->where('rub_id', $rub_id);
        $this->db->where('nom_rub_id', $nom_rub_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerRubroElegible($rub_id) {
        $this->db->where('rub_id', $rub_id);
        $this->db->order_by('rub_ele_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerLosRubros($rub_id) {
        $this->db->select("nombre_rubro.nom_rub_id nom_rub_id,
                           $this->tabla.rub_ele_seleccionado rub_ele_seleccionado,
                           $this->tabla.rub_ele_observacion rub_ele_observacion,
                           $this->tabla.rub_ele_monto rub_ele_monto"
        );
        $this->db->from($this->tabla);
        $this->db->join('nombre_rubro', "nombre_rubro.nom_rub_id = $this->tabla.nom_rub_id");
        $this->db->where("$this->tabla.rub_id", $rub_id);
        $this->db->order_by('nom_rub_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
