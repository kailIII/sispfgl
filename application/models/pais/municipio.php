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
    
    public function obtenerMunicipioGDR($gru_id,$dep_id) {
        $this->db->where('gru_id', $gru_id);
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
    
    public function obtenerMunicipiosSeleccionado($dep_id){
        $query = "SELECT municipio.mun_id, 
                         municipio.mun_nombre
                  FROM 	 seleccion_comite, solicitud_asistencia, municipio
                  WHERE  solicitud_asistencia.sol_asis_id = seleccion_comite.sol_asis_id AND
                         municipio.mun_id = solicitud_asistencia.mun_id AND
                         seleccion_comite.sel_com_seleccionado = 'Si' AND 
                         municipio.dep_id = ?
                  ORDER BY municipio.mun_id";
        $consulta = $this->db->query($query, array($dep_id));
        return $consulta->result();
    }
    
    public function actualizarMunicipioComInt($mun_id,$mun_com_observacion,$mun_fseleccion) {
        $datos = array(
            'mun_com_observacion' => $mun_com_observacion,
            'mun_fseleccion'=> $mun_fseleccion
            
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function obtenerMunicipio($mun_id){
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }
    
    public function obtenerIDVariable($campo,$mun_id) {
        $query = "SELECT COALESCE(". $campo.",0) ".$campo." FROM ".
                $this->tabla." WHERE mun_id=".$mun_id;
        $consulta = $this->db->query($query);
        return $consulta->result();
   }
   
   public function actualizarIndices($campo, $valor, $mun_id) {
        $datos = array(
            $campo => $valor
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
