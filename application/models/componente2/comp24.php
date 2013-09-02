<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Class comp24 extends CI_Model {

    function changeDate($date) {
        $t = explode('/', $date);
        return date('Y-m-d', mktime(0, 0, 0, $t[1], $t[0], $t[2]));
    }

    public function select_data($tabla, $where = null, $out = 'json') {

        return $data = $this->db->get_where($tabla, $where);
        //return json_encode($data->result());
    }

    public function select_table($tabla, $campo) {
        $this->db->from($tabla);
        $this->db->order_by($campo);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_sexo($tabla, $campo_sexo, $campo_index, $index) {
        $male = $this->db->query('SELECT count(*) FROM ' . $tabla . ' WHERE ' . $campo_sexo . " = 'M' AND " . $campo_index . ' = ' . $index . ';')->row()->count;
        $female = $this->db->query('SELECT count(*) FROM ' . $tabla . ' WHERE ' . $campo_sexo . " = 'F' AND " . $campo_index . ' = ' . $index . ';')->row()->count;
        return array('male' => $male, 'female' => $female, 'total' => $male + $female);
    }

    /**
     * Guarda los datos de 2.4-0-A
     */
    public function insert_solicitud_ayuda($municipio, $fecha_emision, $fecha_recepcion) {
        $data_new = array(
            'mun_id' => $municipio,
            'sol_ayu_fecha_emision' => $this->changeDate($fecha_emision),
            'sol_ayu_fecha_recepcion' => $this->changeDate($fecha_recepcion)
        );
        return $this->db->insert('solicitud_ayuda', $data_new);
    }

    /**
     * Funciones 2.4-F0-B
     */
    public function insert_acuerdo_municipal($municipio, $f_acuerdo, $f_recepcion, $f_conformacion, $archivo, $observaciones) {
        $data_new = array(
            'mun_id' => $municipio,
            'acu_mun_fecha_acuerdo' => $this->changeDate($f_acuerdo),
            'acu_mun_fecha_recepcion' => $this->changeDate($f_recepcion),
            'acu_mun_fecha_conformacion' => $this->changeDate($f_conformacion),
            'acu_mun_archivo' => $archivo,
            'acu_mun_observaciones' => $observaciones
        );

        return $this->db->insert('acuerdo_municipal2', $data_new);
    }

    public function getDepto($mun_id) {
        $sql = 'SELECT departamento.dep_nombre 
                FROM departamento , municipio
                WHERE departamento.dep_id = 
                (SELECT municipio.dep_id FROM municipio WHERE municipio.mun_id = ' . $mun_id . ')
                GROUP BY dep_nombre';
        return $this->db->query($sql)->row();
    }

    public function contarInscritos($cap_id) {
        $sql = 'SELECT COUNT(cxp_cap_id) inscripciones
FROM 
  c22_cxp_inscritos A
WHERE A.cxp_cap_id=?';
       $consulta = $this->db->query($sql, array($cap_id));
        return $consulta->result();
    }

    public function get_by_Id($table, $index, $id, $limit = true) {
        $this->db->where($index, $id);
        $this->db->order_by($index, 'asc');
        $query = $this->db->get($table);
        if (!$limit)
            return $query;
        if ($query->num_rows() == 1)
            return $query->row();
        else
            return false;
    }

    public function obtener_por_id($table, $index, $id) {
        $this->db->from($table);
        $this->db->where($index, $id);
        $this->db->order_by($index, 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_row($tabla, $data, $last_id = false) {
        $r = $this->db->insert($tabla, $data);
        if ($last_id) {
            return $this->db->insert_id();
        } else {
            return $r;
        }
    }

    public function update_row($tabla, $campo, $index, $data) {
        $this->db->where($campo, $index);
        return $this->db->update($tabla, $data);
        //return $this->db->update($tabla,$data,array($campo=>$index));
    }

    public function db_row_delete($tabla, $campo, $index) {
        return $this->db->delete($tabla, array($campo => $index));
    }

    public function db_row_delete_two($tabla, $campo1, $index1, $campo2, $index2) {
        return $this->db->delete($tabla, array($campo1 => $index1, $campo2 => $index2));
    }

    public function insert_indicadores1($data) {

        return $this->db->insert('indicadores_desempeno1', $data);
    }

    public function last_id($tabla, $campo) {
        $this->db->order_by($campo, 'desc');
        return $this->db->get($tabla, '1')->row()->$campo;
    }

    public function obtenerCapacitaciones($par_id) {
        $query = "SELECT B.cap_id,B.cap_proceso
FROM c22_capacitaciones B 
WHERE B.cap_id NOT IN (Select cap_id FROM c22_cxp_solicitud WHERE par_id=?) 
ORDER BY cap_proceso";
        $consulta = $this->db->query($query, array($par_id));
        return $consulta->result();
    }

    public function obtenerSolicitudesPorMunicipio($mun_id) {
        $query = "SELECT C.par_nombres||' '|| C.par_apellidos cap_nombres, 
  B.cap_proceso, 
  A.cxp_justificacion,
  (SELECT CASE WHEN COUNT(*)=1 THEN 'Si' ELSE 'No' END FROM c22_cxp_inscritos D WHERE cxp_cap_id=B.cap_id AND cxp_par_id=C.par_id) inscrito
FROM 
  c22_cxp_solicitud A, 
  c22_capacitaciones B, 
  c22_participantes C
WHERE 
  B.cap_id = A.cap_id AND
  C.par_id = A.par_id AND
  C.mun_id = ?";
        $consulta = $this->db->query($query, array($mun_id));
        return $consulta->result();
    }

    public function obtenerSolicitudesParticipantes($par_id) {
        $query = "Select B.cap_id,B.cap_proceso,A.cxp_justificacion
FROM c22_cxp_solicitud A,c22_capacitaciones B
WHERE A.cap_id=B.cap_id AND par_id=?
ORDER BY cap_proceso";
        $consulta = $this->db->query($query, array($par_id));
        return $consulta->result();
    }

    /**
     * Obtener Departamentos por permiso.
     * by Alexis Beltran
     * 
     * Retorna un array con id,dep_nombre, si posee permiso.
     */
    public function getDepartamentos() {
        if (!$this->tank_auth->is_logged_in())
            redirect('/auth');                // logged in

        $deptos = $this->db->get_where('c24_user_depto', array('user_id' => $this->tank_auth->get_user_id()));
        if ($deptos->num_rows() > 0) {
            $deptos = $deptos->row()->deptos;
            $deptos = explode(',', $deptos);
            $this->db->where_in('dep_id', $deptos);
        }
        $this->db->order_by('dep_id', 'ASC');
        $salida['0'] = 'Seleccione';
        foreach ($this->db->get('departamento')->result() as $row) {
            $salida[$row->dep_id] = $row->dep_nombre;
        }
        //print_r($salida);
        return $salida;
    }

    public function obtenerSolicitudAyudaReporte($mun_id) {
        $sql = "SELECT A.sol_ayu_fecha_emision, A.sol_ayu_fecha_recepcion
FROM solicitud_ayuda A
WHERE A.mun_id=?";
        $consulta = $this->db->query($sql, array($mun_id));
        return $consulta->result();
    }

    public function obtenerAcuerdoMunicipalReporte($mun_id) {
        $sql = "SELECT A.acu_mun_fecha_acuerdo, A.acu_mun_fecha_recepcion,A.acu_mun_id
FROM acuerdo_municipal2 A
WHERE A.mun_id=?";
        $consulta = $this->db->query($sql, array($mun_id));
        return $consulta->result();
    }

    public function miembrosComisionReporte($mun_id) {
        $sql = "SELECT count(acu_mun_id) total,
	(Select count(acu_mun_id) from acumun_miembros B where B.acu_mun_id=A.acu_mun_id AND B.mie_sexo='M') hom,
	(Select count(acu_mun_id) from acumun_miembros B where B.acu_mun_id=A.acu_mun_id AND B.mie_sexo='F') muj
FROM acumun_miembros A
WHERE A.acu_mun_id=?
GROUP BY A.acu_mun_id";
        $consulta = $this->db->query($sql, array($mun_id));
        return $consulta->result();
    }

    public function asistenciaTecnicaReporte($mun_id) {
        $sql = "SELECT A.asi_tec_fecha_emision, A.asi_tec_fecha_envio,A.asi_tec_fecha_inicio
FROM asistencia_tecnica A
WHERE A.mun_id=?";
        $consulta = $this->db->query($sql, array($mun_id));
        return $consulta->result();
    }

}

?>
