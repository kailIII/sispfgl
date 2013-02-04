<?php

/*
 * Contiene los metodos para acceder a la tabla nombrefecha_procesoetapa
 *
 * @author Ing. Karen Peñate
 */

class Nombrefecha_procesoetapa extends CI_Model {

    private $tabla = 'nombrefecha_procesoetapa';

    public function insertarFechaProceso($pro_eta_id, $nom_fec_apr_id) {
        $datos = array(
            'pro_eta_id' => $pro_eta_id,
            'nom_fec_apr_id' => $nom_fec_apr_id
        );
        $this->db->insert($this->tabla, $datos);
    }

    public function actualizarFechaProceso($nomfec_proeta_valor,$pro_eta_id, $nom_fec_apr_id) {
        $datos = array(
            'nomfec_proeta_valor' => $nomfec_proeta_valor
        );
        $this->db->where('pro_eta_id', $pro_eta_id);
        $this->db->where('nom_fec_apr_id', $nom_fec_apr_id);
        $this->db->update($this->tabla, $datos);
    }

   function obtenerLasFechasProcesos($pro_eta_id) {
        $this->db->select('nombrefecha_procesoetapa.nomfec_proeta_valor nomfec_proeta_valor, 
                           nombre_fecha_aprobacion.nom_fec_apro_nombre nom_fec_apro_nombre, 
                           nombrefecha_procesoetapa.pro_eta_id pro_eta_id, 
                           nombrefecha_procesoetapa.nom_fec_apr_id nom_fec_apr_id'
        );
        $this->db->from($this->tabla);
        $this->db->join('nombre_fecha_aprobacion', '  nombre_fecha_aprobacion.nom_fec_apr_id = nombrefecha_procesoetapa.nom_fec_apr_id');
        $this->db->where('nombrefecha_procesoetapa.pro_eta_id', $pro_eta_id);
        $this->db->order_by('pro_eta_id');
        $query = $this->db->get();
        return $query->result();
    }

}

?>
