<?php

/*
 * Contiene los metodos para acceder a la tabla MONTO_PROYECCION
 *
 * @author Ing. Karen Peñate
 */

class Monto_proyeccion extends CI_Model {

    private $tabla = 'monto_proyeccion';

    public function agregarMontoProyeccion($pro_ing_id, $mon_pro_nombre,$mon_pro_idnombre) {
        $datos = array(
            'mon_pro_nombre' => $mon_pro_nombre,
            'pro_ing_id' => $pro_ing_id,
            'mon_pro_idnombre'=>$mon_pro_idnombre
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function consultarPorProIngIdNombre($pro_ing_id, $mon_pro_idnombre) {
        $this->db->where('pro_ing_id', $pro_ing_id);
        $this->db->where('mon_pro_idnombre', $mon_pro_idnombre);
        $consulta= $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function editarAnioMontoProyeccion($pro_ing_id, $mon_pro_nombre, $mon_pro_anio) {
        $datos = array(
            'mon_pro_anio' => $mon_pro_anio
        );
        $this->db->where('mon_pro_nombre' . $mon_pro_nombre);
        $this->db->where('pro_ing_id', $pro_ing_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerMontoProyeccion($pro_ing_id) {
        $this->db->where('pro_ing_id', $pro_ing_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function editarAnio($pro_ing_id, $mon_pro_anio) {
        $datos = array(
            'mon_pro_anio' => $mon_pro_anio
        );
        $this->db->where('pro_ing_id', $pro_ing_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerAnio($pro_ing_id) {
        $query = "SELECT DISTINCT COALESCE(mon_pro_anio,0) mon_pro_anio 
                  FROM " . $this->tabla .
                " WHERE pro_ing_id=" . $pro_ing_id;
        $consulta = $this->db->query($query);
        return $consulta->result();
    }

    public function obtenerUltimoId() {
        $this->db->select_max('mon_pro_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

}

?>
