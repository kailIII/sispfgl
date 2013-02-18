<?php

/*
 * Contiene los metodos para acceder a la tabla MUNICIPIO
 *
 * @author Ing. Karen Peñate
 */

class Municipio extends CI_Model {

    private $tabla = 'municipio';

    public function obtenerMunicipioPorDepartamento($dep_id) {
        $this->db->where('dep_id', $dep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerTodosLosMunicipios() {
        $cadena = "SELECT mun_id mun_id,reg_nombre,dep_nombre,mun_nombre FROM departamento,municipio,region WHERE departamento.dep_id = municipio.dep_id AND region.reg_id = departamento.reg_id;";
        $consulta = $this->db->get($cadena);
        return $consulta->result();
    }

    function obtenerNomMunDep($mun_id) {
        $this->db->select('departamento.dep_nombre depto,municipio.mun_nombre muni');
        $this->db->from($this->tabla);
        $this->db->join('departamento', 'departamento.dep_id = municipio.dep_id');
        $this->db->where('municipio.mun_id', $mun_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerMunicipiosSinConsultora($dep_id) {
        $query = "SELECT municipio.mun_id, 
                         municipio.mun_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.cons_id is null AND
                         municipio.dep_id = ?
                  ORDER BY municipio.mun_id";
        $consulta = $this->db->query($query, array($dep_id));
        return $consulta->result();
    }

    public function obtenerMunicipioPorConsultora($cons_id) {
        $this->db->where('cons_id', $cons_id);
        $this->db->order_by('mun_id', 'asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerMunicipioPorConsultoraDepto($cons_id,$dep_id) {
        $this->db->where('cons_id', $cons_id);
        $this->db->where('dep_id', $dep_id);
        $this->db->order_by('mun_id', 'asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function actualizarConsultoraMuni($cons_id, $mun_id) {
        $datos = array(
            'cons_id' => $cons_id
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
