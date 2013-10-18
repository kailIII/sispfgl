<?php

/*
 * Contiene los metodos para acceder a la tabla mapa
 *
 * @author Ing. Karen Peñate
 */

class Mapa extends CI_Model {

    private $tabla = 'mapa';

    public function obtenerMapas($rev_inf_id ) {
        $this->db->where('ref_inf_id ', $rev_inf_id );
        $this->db->from($this->tabla);
        $this->db->join('tipo_mapa',"tipo_mapa.tip_map_id=$this->tabla.tip_map_id");
        $this->db->order_by('map_id');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function agregarMapa($map_nombre, $map_descripcion, $tip_map_id, $rev_inf_id) {
        $datos = array(
            'map_nombre' => $map_nombre,
            'map_descripcion' => $map_descripcion,
            'tip_map_id' => $tip_map_id,
            'ref_inf_id ' => $rev_inf_id 
        );
        $this->db->insert($this->tabla, $datos);
    }
    public function actualizarMapa($map_id,$map_nombre, $map_descripcion, $tip_map_id) {
        $datos = array(
            'map_nombre' => $map_nombre,
            'map_descripcion' => $map_descripcion,
            'tip_map_id' => $tip_map_id
        );
        $this->db->where('map_id',$map_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function eliminarMapa($map_id) {
        $this->db->where('map_id',$map_id);
        $this->db->delete($this->tabla);
    }

}

?>
