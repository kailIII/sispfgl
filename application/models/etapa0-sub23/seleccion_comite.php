<?php

/*
 * Contiene los metodos para acceder a la tabla seleccion_comite
 *
 * @author Ing. Karen Peñate
 */

class Seleccion_comite extends CI_Model {

    private $tabla = 'seleccion_comite';

    public function agregarSeleccionComite($sol_asis_id) {
        $datos = array(
            'sol_asis_id' => $sol_asis_id
        );

        $this->db->insert($this->tabla, $datos);
    }

    public function obtenerId($sol_asis_id) {
        $this->db->where('sol_asis_id', $sol_asis_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

   public function actualizarSeleccionComite($pla_tra_id, $pla_tra_forden_inicio, $pla_tra_fentrega_plan, $pla_tra_frecepcion_obs, $pla_tra_fsuperacion_obs, $pla_tra_fvisto_bueno, $pla_tra_fpresentacion, $pla_tra_frecepcion, $pla_tra_firmada_mun, $pla_tra_firmada_isdem, $pla_tra_firmada_uep, $pla_tra_ruta_archivo, $pla_tra_observaciones) {
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
