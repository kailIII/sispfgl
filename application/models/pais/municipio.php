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
        $consulta = $this->db->get($this->tabla);
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

    public function obtenerMunicipiosSinGrupo($dep_id) {
        $query = "SELECT municipio.mun_id, 
                         municipio.mun_nombre
                  FROM 	 municipio,departamento,region
                  WHERE  municipio.dep_id = departamento.dep_id AND
                         departamento.reg_id = region.reg_id AND
                         municipio.grup_id_pep is null AND
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

    public function obtenerMunicipioPorGrupo($gru_id) {
        $this->db->where('grup_id_pep', $gru_id);
        $this->db->order_by('mun_id', 'asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerMunicipioPorConsultoraDepto($cons_id, $dep_id) {
        $this->db->where('cons_id', $cons_id);
        $this->db->where('dep_id', $dep_id);
        $this->db->order_by('mun_id', 'asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerMunicipioPorGrupoDepto($gru_id, $dep_id) {
        $this->db->where('grup_id_pep', $gru_id);
        $this->db->where('dep_id', $dep_id);
        $this->db->order_by('mun_id', 'asc');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerMunicipioGRD($gru_id, $dep_id) {
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

    public function actualizarGrupoMuni($gru_id, $mun_id) {
        $datos = array(
            'grup_id_pep' => $gru_id
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerMunicipiosSeleccionado($dep_id) {
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

    public function actualizarMunicipioComInt($mun_id, $mun_com_observacion, $mun_fseleccion) {
        $datos = array(
            'mun_com_observacion' => $mun_com_observacion,
            'mun_fseleccion' => $mun_fseleccion
        );
        $this->db->where('mun_id', $mun_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerMunicipio($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerIDVariable($campo, $mun_id) {
        $query = "SELECT COALESCE(" . $campo . ",0) " . $campo . " FROM " .
                $this->tabla . " WHERE mun_id=" . $mun_id;
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

    public function obtenerMaxMuniProceso($gru_id) {
        $this->db->select_max('mun_id');
        $this->db->where('grup_id_pep', $gru_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function gdrReporte1() {
        $sql = "SELECT A.reg_nombre, A.dep_nombre, A.mun_nombre, 
	B.ela_pro_fentrega_idem, 
	MAX (C.rec_mun_frecibido) rec_mun_frecibido,
	D.rev_inf_adjunto_doc,D.rev_inf_frevision_uep,
	E.per_pro_fentrega_isdem, E.per_pro_fentrega_u_i,E.per_pro_frecibe_municipio,
	F.rub_id
FROM 
	(SELECT 
	  region.reg_nombre, 
	  departamento.dep_nombre, 
	  $this->tabla.mun_nombre,
	  region.reg_id, 
	  departamento.dep_id, 
	  $this->tabla.mun_id
	FROM region, departamento, $this->tabla
	WHERE region.reg_id = departamento.reg_id AND departamento.dep_id = $this->tabla.dep_id
	)A 
	LEFT OUTER JOIN elaboracion_proyecto B
	ON A.mun_id=B.mun_id LEFT OUTER JOIN recibido_municipalidad C
	ON B.ela_pro_id=C.ela_pro_id
	LEFT OUTER JOIN revision_informacion D ON A.mun_id=D.mun_id
	LEFT OUTER JOIN perfil_proyecto E ON A.mun_id=E.mun_id
        LEFT OUTER JOIN rubro F ON A.mun_id=F.mun_id
GROUP BY A.reg_nombre, A.dep_nombre, A.mun_nombre, 
	B.ela_pro_fentrega_idem,
	D.rev_inf_adjunto_doc,D.rev_inf_frevision_uep,
	E.per_pro_fentrega_isdem,E.per_pro_fentrega_u_i,E.per_pro_frecibe_municipio,
	F.rub_id
ORDER BY A.reg_nombre ASC";
        $consulta = $this->db->query($sql, array());
        return $consulta->result();
    }

    public function gdrReporte2() {
        $sql = "SELECT A.reg_nombre, A.dep_nombre, A.mun_nombre,B.*
FROM 
	(SELECT 
	  region.reg_nombre, 
	  departamento.dep_nombre, 
	  municipio.mun_nombre,
	  region.reg_id, 
	  departamento.dep_id, 
	  municipio.mun_id
	FROM region, departamento, $this->tabla
	WHERE region.reg_id = departamento.reg_id AND departamento.dep_id = municipio.dep_id
	ORDER BY region.reg_id ASC, departamento.dep_id ASC, $this->tabla.mun_id ASC
	)A 
	LEFT OUTER JOIN seguimiento B
	ON A.mun_id=B.mun_id ";
        $consulta = $this->db->query($sql, array());
        return $consulta->result();
    }

    public function obtenerMunicipiosTodos() {
        $sql = "SELECT A.reg_nombre,B.dep_nombre,C.mun_nombre,C.mun_id 
FROM region A, departamento B, $this->tabla C
WHERE A.reg_id=B.reg_id AND B.dep_id=C.dep_id
ORDER BY A.reg_nombre,B.dep_nombre,C.mun_nombre";
        $consulta = $this->db->query($sql, array());
        return $consulta->result();
    }

}

?>
