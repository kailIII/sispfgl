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

}

?>
