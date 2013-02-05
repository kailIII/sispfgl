<?php

/*
 * Contiene los metodos para acceder a la tabla CRITERIO
 *
 * @author Ing. Karen Peñate
 */

class Participante extends CI_Model {

    private $tabla = 'participante';

    public function obtenerParticipantesGA($gru_apo_id) {
        $this->db->where('gru_apo_id', $gru_apo_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerParticipantesParametrizado($campo,$campo_id) {
        $this->db->where($campo, $campo_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerParticipantesGG($gru_ges_id) {
        $this->db->where('gru_ges_id', $gru_ges_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerParticipantes($campo, $id_campo) {
        $this->db->where($campo, $id_campo);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    public function obtenerMaximado() {
         $this->db->select_max('par_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    

    public function agregarParticipantes($campo, $id_campo, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco,$par_tipo) {
        $datos = array(
            'par_nombre' => $par_nombre,
            'par_apellido' => $par_apellido,
            'par_sexo' => $par_sexo,
            'ins_id' => $ins_id,
            'par_cargo' => $par_cargo,
            'par_tel' => $par_tel,
            'par_dui' => $par_dui,
            'par_edad' => $par_edad,
            'par_proviene' => $par_proviene,
            'par_nivel_esco' => $par_nivel_esco,
            'par_tipo'=>$par_tipo,
            $campo => $id_campo
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarParticipantes($par_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco,$par_tipo) {
        $datos = array(
            'par_nombre' => $par_nombre,
            'par_apellido' => $par_apellido,
            'par_sexo' => $par_sexo,
            'ins_id' => $ins_id,
            'par_cargo' => $par_cargo,
            'par_tel' => $par_tel,
            'par_dui' => $par_dui,
            'par_edad' => $par_edad,
            'par_proviene' => $par_proviene,
            'par_nivel_esco' => $par_nivel_esco,
            'par_tipo'=>$par_tipo
        );
        $this->db->where('par_id', $par_id);
        $this->db->update($this->tabla, $datos);
    }
    
        public function agregarParticipantes2($campo, $id_campo, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco,$par_direccion,$par_email,$par_tipo) {
        $datos = array(
            'par_nombre' => $par_nombre,
            'par_apellido' => $par_apellido,
            'par_sexo' => $par_sexo,
            'ins_id' => $ins_id,
            'par_cargo' => $par_cargo,
            'par_tel' => $par_tel,
            'par_dui' => $par_dui,
            'par_edad' => $par_edad,
            'par_proviene' => $par_proviene,
            'par_nivel_esco' => $par_nivel_esco,
            'par_direccion'=>$par_direccion,
            'par_email'=>$par_email,
            'par_tipo'=>$par_tipo,
            $campo => $id_campo
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarParticipantes2($par_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco,$par_direccion,$par_email,$par_tipo) {
        $datos = array(
            'par_nombre' => $par_nombre,
            'par_apellido' => $par_apellido,
            'par_sexo' => $par_sexo,
            'ins_id' => $ins_id,
            'par_cargo' => $par_cargo,
            'par_tel' => $par_tel,
            'par_dui' => $par_dui,
            'par_edad' => $par_edad,
            'par_proviene' => $par_proviene,
            'par_nivel_esco' => $par_nivel_esco,
            'par_direccion'=>$par_direccion,
            'par_email'=>$par_email,
            'par_tipo'=>$par_tipo
        );
        $this->db->where('par_id', $par_id);
        $this->db->update($this->tabla, $datos);
    }

    public function eliminarParticipantes($par_id) {
        $this->db->where('par_id', $par_id);
        $this->db->delete($this->tabla);
    }

    public function calcularSexo($campo, $id_campo) {
        $sql = "SELECT count(participante.par_sexo) Total,
                  (Select count(*) 
                   FROM participante
                   WHERE " . $campo . " = ? and par_sexo='M' ) Mujeres,
                   (Select count(*) 
                    FROM participante
                    WHERE " . $campo . " = ? and par_sexo='H' ) Hombres,
                   (Select count(*) 
                    FROM participante
                    WHERE " . $campo . " = ? and par_edad>=15 ) Mayor
                  FROM participante
                  WHERE " . $campo . " = ?";
        $consulta = $this->db->query($sql, array($id_campo, $id_campo, $id_campo, $id_campo));
        return $consulta->result();
    }

    public function calcularTotalParticipantes($tabla,$campo_id,$campo) {
        $sql = "SELECT  count(*) Total,
                (SELECT  count(*)
                 FROM participante_".$tabla.", participante
                 WHERE participante_".$tabla.".par_id = participante.par_id AND
                       participante_".$tabla.".".$campo." = ? AND
                       participante.par_sexo='M' AND
                       participante_".$tabla.".par_".substr($campo,0,3)."_participa='Si'
                 )Mujeres,
                (SELECT  count(*)
                 FROM participante_".$tabla.", participante
                 WHERE participante_".$tabla.".par_id = participante.par_id AND
                       participante_".$tabla.".".$campo." = ? AND
                       participante.par_sexo='H' AND
                       participante_".$tabla.".par_".substr($campo,0,3)."_participa='Si'
                )Hombres
               FROM participante_".$tabla.", participante
               WHERE participante_".$tabla.".par_id = participante.par_id AND
                     participante_".$tabla.".".$campo." = ? AND
                     participante_".$tabla.".par_".substr($campo,0,3)."_participa='Si'";
        $consulta = $this->db->query($sql, array($campo_id,$campo_id,$campo_id));
        return $consulta->result();
    }
    
     public function eliminaParticipanteCapacitacion($par_id) {
        $consulta = "DELETE FROM " . $this->tabla . " CASCADE WHERE par_id=?";
        $query = $this->db->query($consulta, array($par_id));
    }

}

?>
