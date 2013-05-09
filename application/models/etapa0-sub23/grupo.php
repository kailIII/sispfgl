<?php

/*
 * Contiene los metodos para acceder a la tabla GRUPO
 *
 * @author Ing. Karen Peñate
 */

class Grupo extends CI_Model {

    private $tabla = 'grupo';

    public function obtenerGrupos() {
        $this->db->order_by('gru_numero');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function ultimoGrupo() {
        $query = "SELECT COALESCE(max(gru_numero),0) gru_numero FROM " . $this->tabla;
        $consulta = $this->db->query($query);
        return $consulta->result();
    }

    public function insertarGrupo($gru_numero) {
        $datos = array(
            "gru_numero" => $gru_numero
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerGrupo($gru_id) {
        $this->db->where('gru_id', $gru_id);
        $this->db->order_by('gru_numero');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerGrupoNoRegistradas($pro_id) {
        $this->load->model('procesoAdministrativo/consultores_interes', 'conInt');
        $consultores = $this->conInt->obtenerIDConsultoresInteres($pro_id);
        $datos = array();
        $i = 0;
        foreach ($consultores as $aux) {
            $datos[$i] = $aux->cons_id;
            $i++;
        }
        if ($i == 0)
            $datos[0] = 0;

        $this->db->where_not_in('cons_id', $datos);
        $this->db->order_by('cons_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerGrupoPorId($cons_id) {
        $this->db->where('cons_id', $cons_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function editarGrupo($cons_id, $cons_nombre, $cons_direccion, $cons_telefono, $cons_telefono2, $cons_fax, $cons_email, $cons_repres_legal, $cons_observaciones) {
        $datos = array(
            "cons_nombre" => $cons_nombre,
            "cons_direccion" => $cons_direccion,
            "cons_telefono" => $cons_telefono,
            "cons_telefono2" => $cons_telefono2,
            "cons_fax" => $cons_fax,
            "cons_email" => $cons_email,
            "cons_repres_legal" => $cons_repres_legal,
            "cons_observaciones" => $cons_observaciones
        );
        $this->db->where('cons_id', $cons_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
