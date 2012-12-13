<?php
/*
 * Contiene los metodos para acceder a la tabla PARTICIPANTE_REUNION
 *
 * @author Ing. Karen Peñate
 */

class Participante_reunion extends CI_Model {

    private $tabla = 'participante_reunion';
    
    public function obtenerParticipantesReu($reu_id,$par_id) {
        $this->db->where('reu_id',$reu_id);
        $this->db->where('par_id',$par_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function actualizaParticipa($reu_id,$par_id,$par_reu_participa) {
        $this->db->where('reu_id',$reu_id);
        $this->db->where('par_id',$par_id);
        $datos = array(
            'par_reu_participa'=>$par_reu_participa
        );
        $this->db->update($this->tabla, $datos);
    }
    
    public function insertarParticipa($reu_id,$par_id) {
        $datos = array(
            'par_id'=>$par_id,
            'reu_id'=>$reu_id,
        );
        $this->db->insert($this->tabla, $datos);
    }
    
}

?>
