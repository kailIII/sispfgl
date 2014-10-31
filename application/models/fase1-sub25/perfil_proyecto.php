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
    , $per_pro_observacion
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
            'per_pro_observacion' => $per_pro_observacion
        );
        $this->db->where('per_pro_id', $per_pro_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerTotalDocumentosAprobadoGDR() {
        $sql = "SELECT count(*) si
                FROM municipio A,$this->tabla B
                WHERE A.mun_id = B.mun_id 
                        AND B.per_pro_fnota_autorizacion IS NOT NULL";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado[0]->si;
    }

    public function obtenerTotalProcesoAdquisicionGDR() {
        $sql = "SELECT count(*) si
                FROM municipio A,$this->tabla B
                WHERE A.mun_id = B.mun_id 
                        AND B.per_pro_frecibe_municipio IS NOT NULL";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado[0]->si;
    }
    
     public function obtenerTotalFisdlIsdemGDR() {
        $sql = "SELECT count(*) si
                FROM municipio A,$this->tabla B
                WHERE A.mun_id = B.mun_id 
                        AND B.per_pro_fencio_fisdl IS NOT NULL";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado[0]->si;
    }

}

?>
