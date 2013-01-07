<?php

/*
 * Contiene los metodos para acceder a la tabla MONTO_PROYECCION
 *
 * @author Ing. Karen Peñate
 */

class Monto_proyeccion extends CI_Model {

    private $tabla = 'monto_proyeccion';
    
    public function agregarMontoProyeccion($pro_ing_id,$mon_pro_nombre) {
        $datos = array(
            'mon_pro_nombre' => $mon_pro_nombre,
            'pro_ing_id' => $pro_ing_id
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function editarAnioMontoProyeccion($pro_ing_id,$mon_pro_nombre,$mon_pro_anio) {
        $datos = array(
            'mon_pro_anio' => $mon_pro_anio
        );
        $this->db->where('mon_pro_nombre'.$mon_pro_nombre);
        $this->db->where('pro_ing_id'.$pro_ing_id);
        $this->db->insert($this->tabla, $datos);
    }
    
   public function obtenerMontoProyeccion($pro_ing_id) {
        $this->db->where('pro_ing_id', $pro_ing_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
