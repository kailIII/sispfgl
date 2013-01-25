<?php

/*
 * Contiene los metodos para acceder a la tabla CONSULTOR
 *
 * @author Ing. Karen Peñate
 */

class Consultor extends CI_Model {

    private $tabla = 'consultor';

    public function obtenerConsultores() {
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function insertarConsultor($con_nombre, $con_apellido, $con_telefono, $con_email, $pro_pep_id, $cons_id) {
        if ($cons_id == 0) {
            $datos = array(
                "con_nombre" => $con_nombre,
                "con_apellido" => $con_apellido,
                "con_telefono" => $con_telefono,
                "con_email" => $con_email,
                "pro_pep_id" => $pro_pep_id
            );
        } else {
            $datos = array(
                "con_nombre" => $con_nombre,
                "con_apellido" => $con_apellido,
                "con_telefono" => $con_telefono,
                "con_email" => $con_email,
                "pro_pep_id" => $pro_pep_id,
                "cons_id" => $cons_id
            );
        }
        $this->db->insert($this->tabla, $datos);
    }

    public function editarUsuarioConsultor($con_id, $usuario) {
        $datos = array(
            "user" => $usuario
        );
        $this->db->where('con_id', $con_id);
        $this->db->update($this->tabla, $datos);
    }
    
    public function obtenerIdConsultorD(){
        $this->db->select_max('con_id');
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function obtenerIdConsultor($pro_pep_id) {
        $this->db->select('con_id');
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function obtenerConsultor($con_id) {
        $this->db->where('con_id', $con_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    function obtenerIdDepartamento($pro_pep_id) {

        $consulta = 'SELECT departamento.dep_nombre AS "Depto", municipio.mun_nombre AS "Muni",
                            region.reg_nombre AS "Region",proyecto_pep.pro_pep_nombre AS "Nombre"
                     FROM proyecto_pep, municipio, departamento, region
                     WHERE proyecto_pep.mun_id = municipio.mun_id AND
                           municipio.dep_id = departamento.dep_id AND
                           departamento.reg_id = region.reg_id AND
                           proyecto_pep.pro_pep_id=?';
        $query = $this->db->query($consulta, array($pro_pep_id));
        return $query->result_array();
    }
    
    public function editarConsultor($con_email, $con_nombre, $con_apellido, $con_telefono,$cons_id,$con_id) {
        $datos = array(
            "con_apellido" => $con_apellido,
            "con_email" => $con_email,
            "con_nombre" => $con_nombre,
            "con_telefono" => $con_telefono,
            "cons_id" => $cons_id
        );
        $this->db->where('con_id', $con_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
