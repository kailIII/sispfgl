<?php
/*
 * Contiene los metodos para acceder a la tabla PARTICIPANTE_DEFINICION
 *
 * @author Ing. Karen Peñate
 */

class Participante_definicion extends CI_Model {

    private $tabla = 'participante_definicion';
    
    public function obtenerParticipantesDef($def_id,$par_id) {
        $this->db->where('def_id',$def_id);
        $this->db->where('par_id',$par_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function actualizaParticipa($def_id,$par_id,$par_def_participa) {
        $this->db->where('def_id',$def_id);
        $this->db->where('par_id',$par_id);
        $datos = array(
            'par_def_participa'=>$par_def_participa
        );
        $this->db->update($this->tabla, $datos);
    }
    
    public function insertarParticipa($def_id,$par_id) {
        $datos = array(
            'par_id'=>$par_id,
            'def_id'=>$def_id,
        );
        $this->db->insert($this->tabla, $datos);
    }
    
}

?>
