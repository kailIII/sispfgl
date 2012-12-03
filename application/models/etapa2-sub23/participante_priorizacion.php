<?php
/*
 * Contiene los metodos para acceder a la tabla PARTICIPANTE_PRIORIZACION
 *
 * @author Ing. Karen Peñate
 */

class Participante_priorizacion extends CI_Model {

    private $tabla = 'participante_priorizacion';
    
    public function obtenerParticipantesPri($pri_id,$par_id) {
        $this->db->where('pri_id',$pri_id);
        $this->db->where('par_id',$par_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function actualizaParticipa($pri_id,$par_id,$par_pri_participa) {
        $this->db->where('pri_id',$pri_id);
        $this->db->where('par_id',$par_id);
        $datos = array(
            'par_pri_participa'=>$par_pri_participa
        );
        $this->db->update($this->tabla, $datos);
    }
    
    public function insertarParticipa($pri_id,$par_id) {
        $datos = array(
            'par_id'=>$par_id,
            'pri_id'=>$pri_id,
        );
        $this->db->insert($this->tabla, $datos);
    }
    
}

?>
