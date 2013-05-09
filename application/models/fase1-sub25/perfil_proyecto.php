<?php

/*
 * Contiene los metodos para acceder a la tabla perfil_proyecto
 *
 * @author Ing. Karen Peñate
 */

class Perfil_proyecto extends CI_Model {

    private $tabla = 'perfil_proyecto';

    public function agregarPerfilProyecto($mun_id) {
        $datos = array(
            'mun_id' => $mun_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function idPorMunicipio($mun_id) {
        $this->db->where('mun_id', $mun_id);
        $consulta = $this->db->get($this->tabla);
        return $consulta->result();
    }

    public function actualizarPerfilProyecto($per_pro_id, $per_pro_fentrega_isdem, $per_pro_fentrega_uep, $per_pro_fnota_autorizacion
    , $per_pro_fentrega_u_i, $per_pro_ftdr, $per_pro_fespecificacion
    , $per_pro_fcarpeta_reducida, $per_pro_frecibe_municipio, $per_pro_femision_acuerdo
    , $per_pro_fcertificacion, $per_pro_frecibe, $per_pro_fencio_fisdl
    , $per_pro_consultor_individual, $per_pro_firma, $per_pro_ong
    , $per_pro_observacion, $per_pro_tdr_ruta_archivo, $per_pro_esp_ruta_archivo
    , $per_pro_car_ruta_archivo, $per_pro_acu_ruta_archivo, $per_pro_per_ruta_archivo
    ) {
        $datos = array(
            'per_pro_fentrega_isdem' => $per_pro_fentrega_isdem,
            'per_pro_fentrega_uep' => $per_pro_fentrega_uep,
            'per_pro_fnota_autorizacion' => $per_pro_fnota_autorizacion,
            'per_pro_fentrega_u_i' => $per_pro_fentrega_u_i,
            'per_pro_ftdr' => $per_pro_ftdr,
            'per_pro_fespecificacion' => $per_pro_fespecificacion,
            'per_pro_fcarpeta_reducida' => $per_pro_fcarpeta_reducida,
            'per_pro_frecibe_municipio' => $per_pro_frecibe_municipio,
            'per_pro_femision_acuerdo' => $per_pro_femision_acuerdo,
            'per_pro_fcertificacion' => $per_pro_fcertificacion,
            'per_pro_frecibe' => $per_pro_frecibe,
            'per_pro_fencio_fisdl' => $per_pro_fencio_fisdl,
            'per_pro_consultor_individual' => $per_pro_consultor_individual,
            'per_pro_firma' => $per_pro_firma,
            'per_pro_ong' => $per_pro_ong,
            'per_pro_observacion' => $per_pro_observacion,
            'per_pro_tdr_ruta_archivo' => $per_pro_tdr_ruta_archivo,
            'per_pro_esp_ruta_archivo' => $per_pro_esp_ruta_archivo,
            'per_pro_car_ruta_archivo' => $per_pro_car_ruta_archivo,
            'per_pro_acu_ruta_archivo' => $per_pro_acu_ruta_archivo,
            'per_pro_per_ruta_archivo' => $per_pro_per_ruta_archivo
        );
        $this->db->where('per_pro_id', $per_pro_id);
        $this->db->update($this->tabla, $datos);
    }

}

?>