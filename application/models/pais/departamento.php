<?php

/*
 * Contiene los metodos para acceder a la tabla DEPARTAMENTO
 *
 * @author Ing. Karen Peñate
 */

class Departamento extends CI_Model {

    private $tabla = 'departamento';

    public function obtenerDepartamentosPorRegion($reg_id) {
        $this->db->where('reg_id', $reg_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerIdDepartamentosPorRegion($reg_id) {
        $this->db->select('dep_id');
        $this->db->where('reg_id', $reg_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerDepartamentos() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerIdPorNombre($dep_nombre) {
        $this->db->select('dep_id');
        $this->db->where('dep_nombre', $dep_nombre);
        $consulta = $this->db->get($this->tabla);
        $departamento = $consulta->result();
        return $departamento[0]->dep_id;
    }

    public function obtenerDepartamentosSinConsultora($reg_id) {
        $query = "SELECT distinct(departamento.dep_id), 
                         departamento.dep_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.cons_id is null AND
                         departamento.reg_id = ?
                  ORDER BY departamento.dep_id";
        $consulta = $this->db->query($query, array($reg_id));
        return $consulta->result();
    }

    public function obtenerDepartamentosSinGrupo($reg_id) {
        $query = "SELECT distinct(departamento.dep_id), 
                         departamento.dep_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.grup_id_pep is null AND
                         departamento.reg_id = ?
                  ORDER BY departamento.dep_id";
        $consulta = $this->db->query($query, array($reg_id));
        return $consulta->result();
    }

    public function obtenerDepartamentosPorConsultora($cons_id) {
        $query = "SELECT distinct(departamento.dep_id), 
                         departamento.dep_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.cons_id = ?
                  ORDER BY departamento.dep_id";
        $consulta = $this->db->query($query, array($cons_id));
        return $consulta->result();
    }

    public function obtenerDepartamentosPorGrupo($gru_id) {
        $query = "SELECT distinct(departamento.dep_id), 
                         departamento.dep_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.grup_id_pep = ?
                  ORDER BY departamento.dep_id";
        $consulta = $this->db->query($query, array($gru_id));
        return $consulta->result();
    }
    
    public function obtenerDepartamentosPorGrupoRegion($gru_id,$reg_id) {
        $query = "SELECT distinct(departamento.dep_id), 
                         departamento.dep_nombre
                  FROM 	 municipio,departamento
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         municipio.grup_id_pep = ? AND
                         departamento.reg_id = ?
                  ORDER BY departamento.dep_id";
        $consulta = $this->db->query($query, array($reg_id,$gru_id));
        return $consulta->result();
    }

    public function obtenerDepartamentosSeleccionado() {
        $query = "SELECT distinct(departamento.dep_id), 
                         departamento.dep_nombre
                  FROM 	 seleccion_comite, solicitud_asistencia, municipio, departamento
                  WHERE  solicitud_asistencia.sol_asis_id = seleccion_comite.sol_asis_id AND
                         municipio.mun_id = solicitud_asistencia.mun_id AND
                         municipio.dep_id = departamento.dep_id AND
                         seleccion_comite.sel_com_seleccionado = 'Si'
                  ORDER BY departamento.dep_id";
        $consulta = $this->db->query($query, array());
        return $consulta->result();
    }

    public function obtenerDepartamentosPorGrupoGRD($gru_id) {
        $query = "SELECT distinct(departamento.dep_id), 
                         departamento.dep_nombre
                  FROM 	 municipio,departamento
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         municipio.gru_id = ?
                  ORDER BY departamento.dep_id";
        $consulta = $this->db->query($query, array($gru_id));
        return $consulta->result();
    }

}

?>
