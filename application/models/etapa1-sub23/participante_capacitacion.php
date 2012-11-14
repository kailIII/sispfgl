<?php
/*
 * Contiene los metodos para acceder a la tabla PARTICIPANTE_CAPACITACION
 *
 * @author Ing. Karen Peñate
 */

class Participante_capacitacion extends CI_Model {

    private $tabla = 'participante_capacitacion';
    
    public function obtenerParticipantesCap($cap_id,$par_id) {
        $this->db->where('cap_id',$cap_id);
        $this->db->where('par_id',$par_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }
    
    public function actualizaParticipa($cap_id,$par_id,$par_cap_participa) {
        $this->db->where('cap_id',$cap_id);
        $this->db->where('par_id',$par_id);
        $datos = array(
            'par_cap_participa'=>$par_cap_participa
        );
        $this->db->update($this->tabla, $datos);
    }
    
    public function insertarParticipa($cap_id,$par_id) {
        $datos = array(
            'par_id'=>$par_id,
            'cap_id'=>$cap_id,
        );
        $this->db->insert($this->tabla, $datos);
    }
    
    public function insertarOtrosParticipa($cap_id,$dui) {
        $this->load->model('participante');
        $participante=$this->participante->obtenerParticipantes('par_dui', $dui);
        
        $datos = array(
            'par_id'=>$participante[0]->par_id,
            'cap_id'=>$cap_id,
            'par_cap_participa'=>'Si'
        );
        $this->db->insert($this->tabla, $datos);
    }
    
}

?>
