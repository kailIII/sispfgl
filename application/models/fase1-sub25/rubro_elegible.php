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
    public function obtenerRubrosReporte($mun_id){
        $sql="SELECT C.nom_rub_nombre, rub_ele_observacion, rub_ele_seleccionado 
FROM rubro A, rubro_elegible B, nombre_rubro C
WHERE A.rub_id=B.rub_id AND C.nom_rub_id=B.nom_rub_id
	AND A.mun_id=?";
         $consulta = $this->db->query($sql, array($mun_id));
        return $consulta->result();
    }

}

?>
