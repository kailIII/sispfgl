<?php

/*
 * Contiene los metodos para acceder a la tabla proceso
 *
 * @author Ing. Karen Peñate
 */

class Proceso extends CI_Model {

    private $tabla = 'proceso';

    public function agregarPro($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function contarProPorMuni($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function obtenerPro($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function editarPro($pro_id,$pro_exp_ruta_archivo,$pro_faclara_dudas,$pro_fexpresion_interes,$pro_fpublicacion,$pro_numero,$pro_observacion1,$pro_pub_ruta_archivo) {
        $datos = array(            
            'pro_numero' => $pro_numero,
            'pro_fpublicacion' => $pro_fpublicacion,
            'pro_faclara_dudas' => $pro_faclara_dudas,
            'pro_fexpresion_interes' => $pro_fexpresion_interes,
            'pro_observacion1' => $pro_observacion1,
            'pro_pub_ruta_archivo' => $pro_pub_ruta_archivo,
            'pro_exp_ruta_archivo' => $pro_exp_ruta_archivo
        );        
        $this->db->where('pro_id',$pro_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function editarPro2($pro_id, $pro_ffinalizacion,$pro_finicio) {
        $datos = array(            
            'pro_ffinalizacion' => $pro_ffinalizacion,
            'pro_finicio' => $pro_finicio
        );        
        $this->db->where('pro_id',$pro_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
