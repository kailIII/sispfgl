<?php

/*
 * Contiene los metodos para acceder a la tabla autor_estrategia
 *
 * @author Ing. Karen Peñate
 */

class Autor_estrategia extends CI_Model {

    private $tabla = 'autor_estrategia';

    public function obtenerActores($est_com_id) {
        $this->db->where('est_com_id', $est_com_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
   
    public function agregarActores($aut_est_nombre,$aut_est_fecha,$aut_est_cantidadm,$aut_est_cantidadh,$est_com_id,$tip_act_id) {
        $datos = array(
            'aut_est_nombre'=>$aut_est_nombre,
            'aut_est_fecha'=>$aut_est_fecha,
            'aut_est_cantidadm'=>$aut_est_cantidadm,
            'aut_est_cantidadh'=>$aut_est_cantidadh,
            'est_com_id'=>$est_com_id,
            'tip_act_id'=>$tip_act_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarActores($aut_est_id,$aut_est_nombre,$aut_est_fecha,$aut_est_cantidadm,$aut_est_cantidadh,$tip_act_id) {
        $datos = array(
            'aut_est_nombre'=>$aut_est_nombre,
            'aut_est_fecha'=>$aut_est_fecha,
            'aut_est_cantidadm'=>$aut_est_cantidadm,
            'aut_est_cantidadh'=>$aut_est_cantidadh,
            'tip_act_id'=>$tip_act_id
        );
        $this->db->where('aut_est_id', $aut_est_id);
        $this->db->update($this->tabla, $datos);
    }
    
   
    public function eliminarActores($aut_est_id) {
        $this->db->where('aut_est_id', $aut_est_id);
        $this->db->delete($this->tabla);
    }

}

?>
