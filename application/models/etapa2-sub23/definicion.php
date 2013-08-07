<?php

/*
 * Contiene los metodos para acceder a la tabla DEFINICION
 * que en pantalla es el equipo gestor
 *
 * @author Ing. Karen Peñate
 */

class Definicion extends CI_Model {

    private $tabla = 'definicion';

    public function contarDefPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function agregarDef($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerIdDef($pro_pep_id) {
        $this->db->select('def_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function actualizarDef($def_id, $def_fecha, $def_ruta_archivo,$def_observacion) {
        $datos = array(
            'def_fecha' => $def_fecha,
            'def_ruta_archivo' => $def_ruta_archivo,
            'def_observacion'=>$def_observacion
        );
        $this->db->where('def_id', $def_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerDef($def_id) {
        $this->db->where('def_id', $def_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function verificarDefinicion($mun_id){
        $consulta = "SELECT CASE WHEN B.def_fecha IS NOT NULL AND B.def_ruta_archivo IS NOT NULL THEN 1 ELSE  0 END resultado
                     FROM proyecto_pep A, $this->tabla B
                     WHERE A.pro_pep_id=B.pro_pep_id AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }
    
    public function verificarParticipantesDefinicion($mun_id){
        $consulta = "SELECT count(D.def_id) valor 
                     FROM proyecto_pep A, $this->tabla B, participante_definicion D
                     WHERE A.pro_pep_id=B.pro_pep_id AND D.def_id=B.def_id 
	                     AND D.par_def_participa IS NOT NULL AND A.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();   
    }

}

?>
