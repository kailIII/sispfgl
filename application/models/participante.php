<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO
 *
 * @author Ing. Karen Peñate
 */

class Participante extends CI_Model {

    private $tabla = 'participante';
    
    public function obtenerParticipantesGA($gru_apo_id) {
        $this->db->where('gru_apo_id',$gru_apo_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerParticipantesREU($reu_id) {
        $this->db->where('reu_id',$reu_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    
    public function agregarParticipantes($campo,$id_campo,$par_nombre , $par_apellido, $par_sexo,$ins_id,$par_cargo) {
        $datos = array(
            'par_nombre'=>$par_nombre, 
            'par_apellido'=>$par_apellido, 
            'par_sexo'=>$par_sexo,
            'ins_id'=>$ins_id,
            'par_cargo'=>$par_cargo,
            $campo=>$id_campo
        );
        $this->db->insert($this->tabla, $datos);
    }
    public function editarParticipantes($par_id,$par_nombre , $par_apellido, $par_sexo,$ins_id,$par_cargo) {
        $datos = array(
            'par_nombre'=>$par_nombre, 
            'par_apellido'=>$par_apellido, 
            'par_sexo'=>$par_sexo,
            'ins_id'=>$ins_id,
            'par_cargo'=>$par_cargo
        );
        $this->db->where('par_id',$par_id);
        $this->db->update($this->tabla, $datos);
    
    }
    
       public function eliminarParticipantes($par_id) {
        $this->db->where('par_id',$par_id);
        $this->db->delete($this->tabla);
    
    }

}

?>
