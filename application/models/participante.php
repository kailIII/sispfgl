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

    public function obtenerParticipantes($campo, $id_campo) {
        $this->db->where($campo, $id_campo);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function agregarParticipantes($campo, $id_campo, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel, $par_dui, $par_edad, $par_proviene, $par_nivel_esco) {
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
            $campo => $id_campo
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function editarParticipantes($par_id, $par_nombre, $par_apellido, $par_sexo, $ins_id, $par_cargo, $par_tel,$par_dui, $par_edad, $par_proviene, $par_nivel_esco) {
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
            'par_nivel_esco' => $par_nivel_esco
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
                   WHERE " . $campo . " = ? and par_sexo='F' ) Mujeres,
                   (Select count(*) 
                    FROM participante
                    WHERE " . $campo . " = ? and par_sexo='M' ) Hombres,
                   (Select count(*) 
                    FROM participante
                    WHERE " . $campo . " = ? and par_edad>=15 ) Mayor
                  FROM participante
                  WHERE " . $campo . " = ?";
        $consulta = $this->db->query($sql, array($id_campo, $id_campo,$id_campo, $id_campo));
        return $consulta->result();
    }

}

?>
