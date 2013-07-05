<?php

/*
 * Contiene los metodos para acceder a la tabla revision_informacion
 *
 * @author Ing. Karen Peñate
 */

class Revision_informacion extends CI_Model {

    private $tabla = 'revision_informacion';

    public function agregarRevisionInformacion($mun_id) {
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

    public function actualizarRevisionInformacionP1($rev_inf_id, $rev_inf_fregistro_asesor, $rev_inf_frevision_uep, $rev_inf_adjunto_doc, $rev_inf_plan_municipalidad, $rev_inf_plan_contingencia, $rev_inf_felaboracion
    , $rev_inf_plan_oformato, $rev_inf_gestion_reactiva, $rev_inf_ogestion_reactiva, $rev_inf_gestion_correctiva, $rev_inf_ogestion_correctiva
    , $rev_inf_gestion_prospectiva, $rev_inf_ogestion_prospectiva, $rev_inf_plan_comunal, $rev_inf_mapa, $rev_inf_presentoa, $rev_inf_conclusion) {
        $datos = array(
            'rev_inf_fregistro_asesor' => $rev_inf_fregistro_asesor,
            'rev_inf_frevision_uep' => $rev_inf_frevision_uep,
            'rev_inf_adjunto_doc' => $rev_inf_adjunto_doc,
            'rev_inf_plan_municipalidad' => $rev_inf_plan_municipalidad,
            'rev_inf_plan_contingencia' => $rev_inf_plan_contingencia,
            'rev_inf_felaboracion' => $rev_inf_felaboracion,
            'rev_inf_plan_oformato' => $rev_inf_plan_oformato,
            'rev_inf_gestion_reactiva' => $rev_inf_gestion_reactiva,
            'rev_inf_ogestion_reactiva' => $rev_inf_ogestion_reactiva,
            'rev_inf_gestion_correctiva' => $rev_inf_gestion_correctiva,
            'rev_inf_ogestion_correctiva' => $rev_inf_ogestion_correctiva,
            'rev_inf_gestion_prospectiva' => $rev_inf_gestion_prospectiva,
            'rev_inf_ogestion_prospectiva' => $rev_inf_ogestion_prospectiva,
            'rev_inf_plan_comunal' => $rev_inf_plan_comunal,
            'rev_inf_mapa' => $rev_inf_mapa,
            'rev_inf_presentoa' => $rev_inf_presentoa,
            'rev_inf_conclusion' => $rev_inf_conclusion
        );
        $this->db->where('rev_inf_id', $rev_inf_id);
        $this->db->update($this->tabla, $datos);
    }

    public function actualizarRevisionInformacionP2($rev_inf_id, $rev_inf_presento, $rev_inf_comision_conformada, $rev_inf_fconformacion, $rev_inf_presentob_eo, $rev_inf_dpresentob_eo, $rev_inf_comision
    , $rev_inf_acta_comision, $rev_inf_dacta_comision, $rev_inf_capacitacion, $rev_inf_dcapacitacion, $rev_inf_herramienta
    , $rev_inf_inv_herramienta, $rev_inf_dinv_herramienta, $rev_inf_presentoc, $rev_inf_dpresentoc, $rev_inf_presentod, $rev_inf_mapa_identificacion
    , $rev_inf_dmapa_identificacion, $rev_inf_presentoe, $rev_inf_dpresentoe, $rev_inf_dpresentof, $rev_inf_presentof) {
        $datos = array(
            'rev_inf_presento' => $rev_inf_presento,
            'rev_inf_comision_conformada' => $rev_inf_comision_conformada,
            'rev_inf_fconformacion' => $rev_inf_fconformacion,
            'rev_inf_presentob_eo' => $rev_inf_presentob_eo,
            'rev_inf_dpresentob_eo' => $rev_inf_dpresentob_eo,
            'rev_inf_comision' => $rev_inf_comision,
            'rev_inf_acta_comision' => $rev_inf_acta_comision,
            'rev_inf_dacta_comision' => $rev_inf_dacta_comision,
            'rev_inf_capacitacion' => $rev_inf_capacitacion,
            'rev_inf_dcapacitacion' => $rev_inf_dcapacitacion,
            'rev_inf_herramienta' => $rev_inf_herramienta,
            'rev_inf_inv_herramienta' => $rev_inf_inv_herramienta,
            'rev_inf_dinv_herramienta' => $rev_inf_dinv_herramienta,
            'rev_inf_presentoc' => $rev_inf_presentoc,
            'rev_inf_dpresentoc' => $rev_inf_dpresentoc,
            'rev_inf_presentod' => $rev_inf_presentod,
            'rev_inf_mapa_identificacion' => $rev_inf_mapa_identificacion,
            'rev_inf_dmapa_identificacion' => $rev_inf_dmapa_identificacion,
            'rev_inf_presentoe' => $rev_inf_presentoe,
            'rev_inf_dpresentoe' => $rev_inf_dpresentoe,
            'rev_inf_dpresentof' => $rev_inf_dpresentof,
            'rev_inf_presentof' => $rev_inf_presentof
        );
        $this->db->where('rev_inf_id', $rev_inf_id);
        $this->db->update($this->tabla, $datos);
    }

    public function actualizarRevisionInformacionP3($rev_inf_id, $rev_inf_fregistro_asesor, $rev_inf_frevision_uep, $rev_inf_adjunto_doc) {
        $datos = array(
            'rev_inf_fregistro_asesor' => $rev_inf_fregistro_asesor,
            'rev_inf_frevision_uep' => $rev_inf_frevision_uep,
            'rev_inf_adjunto_doc' => $rev_inf_adjunto_doc
        );
        $this->db->where('rev_inf_id', $rev_inf_id);
        $this->db->update($this->tabla, $datos);
    }

    public function obtenerTotalNoTieneInformacionGDR() {
        $sql = "SELECT COUNT(*) si 
                FROM municipio A,$this->tabla B, elaboracion_proyecto C
                WHERE A.mun_id = B.mun_id AND A.mun_id = C.mun_id
                        AND C.ela_pro_carta_exp IS TRUE AND B.rev_inf_adjunto_doc IS TRUE";
        $consulta = $this->db->query($sql, array());
        $resultado = $consulta->result();
        return $resultado[0]->si;
    }

}

?>
