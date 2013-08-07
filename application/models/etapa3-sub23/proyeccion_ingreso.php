<?php

/*
 * Contiene los metodos para acceder a la tabla PROYECCION_INGRESO
 *
 * @author Ing. Karen Peñate
 */

class Proyeccion_ingreso extends CI_Model {

    private $tabla = 'proyeccion_ingreso';

    public function agregarProIng($pro_pep_id) {
        $datos = array(
            'pro_pep_id' => $pro_pep_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function contarProIngPorPep($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function obtenerProIng($pro_pep_id) {
        $this->db->where('pro_pep_id', $pro_pep_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result_array();
    }

    public function editarProyeccionIngreso($pro_ing_id, $pro_ing_observacion) {
        $datos = array(
            'pro_ing_observacion ' => $pro_ing_observacion
        );
        $this->db->where('pro_ing_id', $pro_ing_id);
        $this->db->update($this->tabla, $datos);
    }

    public function verificarProyeccionIngreso($mun_id) {
        $consulta = "SELECT count(A.pro_ing_id) valor
                      FROM monto_proyeccion A, proyecto_pep B, $this->tabla C
                      WHERE C.pro_pep_id=B.pro_pep_id AND A.pro_ing_id=C.pro_ing_id
                      AND A.mon_pro_dispo_financiera <> 0 AND A.mon_pro_ingresos <> 0 AND A.mon_pro_anio IS NOT NULL
                      AND B.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();
    }

    public function verificarProyeccionIngresoDetalle($mun_id) {
        $consulta = "SELECT count(A.mon_pro_id) valor
                      FROM monto_proyeccion A, proyecto_pep B, $this->tabla C,detmonto_proyeccion D
                      WHERE C.pro_pep_id=B.pro_pep_id AND A.pro_ing_id=C.pro_ing_id AND D.mon_pro_id=A.mon_pro_id
                      AND D.dmon_pro_ingresos <> 0 AND D.dmon_pro_anio IS NOT NULL
                      AND B.mun_id=?";
        $query = $this->db->query($consulta, array($mun_id));
        return $query->result();
    }

}

?>
