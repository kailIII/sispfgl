<?php

/*
 * Contiene los metodos para acceder a la tabla plan_trabajo
 *
 * @author Ing. Karen Peñate
 */

class Plan_trabajo extends CI_Model {

    private $tabla = 'plan_trabajo';

    public function agregarPlanTrabajo($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );

        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerId($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function contarPlanTrabajo($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $this->db->from($this->tabla);
        $consulta = $this->db->count_all_results();
        return $consulta;
    }

    public function actualizarPlanTrabajo($pla_tra_id, $pla_tra_forden_inicio, $pla_tra_fentrega_plan, $pla_tra_frecepcion_obs, $pla_tra_fsuperacion_obs, $pla_tra_fvisto_bueno, $pla_tra_fpresentacion, $pla_tra_frecepcion, $pla_tra_firmada_mun, $pla_tra_firmada_isdem, $pla_tra_firmada_uep, $pla_tra_ruta_archivo, $pla_tra_observaciones) {
        $datos = array(
            'pla_tra_forden_inicio' => $pla_tra_forden_inicio,
            'pla_tra_fentrega_plan' => $pla_tra_fentrega_plan,
            'pla_tra_frecepcion_obs' => $pla_tra_frecepcion_obs,
            'pla_tra_fsuperacion_obs' => $pla_tra_fsuperacion_obs,
            'pla_tra_fvisto_bueno' => $pla_tra_fvisto_bueno,
            'pla_tra_fpresentacion' => $pla_tra_fpresentacion,
            'pla_tra_frecepcion' => $pla_tra_frecepcion,
            'pla_tra_firmada_mun' => $pla_tra_firmada_mun,
            'pla_tra_firmada_isdem' => $pla_tra_firmada_isdem,
            'pla_tra_firmada_uep' => $pla_tra_firmada_uep,
            'pla_tra_ruta_archivo' => $pla_tra_ruta_archivo,
            'pla_tra_observaciones' => $pla_tra_observaciones
        );
        $this->db->where('pla_tra_id', $pla_tra_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>
